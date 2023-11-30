<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class serviceController extends Controller
{
    public function serviceList(){
        $serviceData = DB::table('services')->get();
        View::share([
            'services'=>$serviceData
        ]);
        return view('services.service');
    }

    public function addService(){
        $serviceData = DB::table('services')->get();
        View::share([
            'services'=>$serviceData
        ]);
        return view('services.addService');
    }

    public function addServicePost(Request $request){
        $request->validate([
            'title' => 'required|max:500',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image = $request->file('image');
        $directory = 'uploads/service/';
        $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
        $image->move($directory, $image_name);
        $ins = DB::table('services')->insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>'uploads/service/'.$image_name,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back()->with($ins ? 'success' : 'error',true);
    }


    public function serviceDelete($id){
        $serviceData = DB::table('services')->find($id);

        if ($serviceData && file_exists($serviceData->image)) {
            unlink($serviceData->image);
        }

        return redirect()->back()->with($serviceData ? 'success' : 'error', DB::table('services')->where('id', $id)->delete());
    }



    public function serviceEditPost(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'status' => 'required',
            'description' => 'required|max:500',
            'image' => 'mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image_name=$request->old_image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $directory = 'uploads/service/';
            if(file_exists($image_name)){
                unlink($image_name);
            }
            $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
            $image->move($directory, $image_name);
            $image_name=$directory.$image_name;
        }




        $add = DB::table('services')
            ->where('id', $request->id)
            ->update([
                'title'=>$request->title,
                'status'=>$request->status,
                'description'=>$request->description,
                'image'=>$image_name,
                'updated_at'=> now(),
            ]);
        return redirect()->back()->with($add ? 'success' : 'error',true);
    }

    public function serviceView(Request $request){

        $service = DB::table('services')->where('id',$request->id)->first();
        return response()->json([
            'service'=>$service ?? [],
            'status'=>(bool)$service,

        ]);
    }

}
