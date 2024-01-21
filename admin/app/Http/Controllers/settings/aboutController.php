<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aboutController extends Controller
{

    public function aboutView(){
        $aboutData = DB::table('settings')->where('id',1)->first();
        return view('settings.about',compact('aboutData'));
    }

    public function aboutEditPost(Request $request){


        $request->validate([
            'about_title' => 'required|max:500',
            'about_content' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        $image_name = $request->old_image;
        if($request->hasFile('image')){
            if(file_exists($request->old_image)){
                unlink($request->old_image);
            }
            $image = $request->file('image');
            $directory = 'uploads/about/';
            $image_name = "about." . $image->getClientOriginalExtension();
            $image->move($directory, $image_name);
            $image_name = $directory.$image_name;
        }

        $upd = DB::table('settings')
            ->where('id', 1)
            ->update([
                'about_title'=>$request->about_title,
                'about_content'=>$request->about_content,
                'about_image'=>$image_name,
                'updated_at'=>now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error',true);
    }
}
