<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siteInfoController extends Controller

{

    public function siteInfoView(){
        $siteInfoData = DB::table('settings')->where('id',1)->first();
        return view('settings.siteInfo',compact('siteInfoData'));
    }

    public function siteInfoEditPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'logo' => 'nullable|mimes:png|max:1024',
            'favicon' => 'nullable|mimes:png|max:1024',
        ]);
        $logo_name = $request->old_logo;
        if($request->hasFile('logo')){
            if(file_exists($request->old_logo)){
                unlink($request->old_logo);
            }
            $logo = $request->file('logo');
            $directory = 'uploads/siteInfo/';
            $logo_name = "logo." . $logo->getClientOriginalExtension();
            $logo->move($directory, $logo_name);
            $logo_name = $directory.$logo_name;

        };

        $favicon_name = $request->old_favicon;
        if($request->hasFile('favicon')){
            if(file_exists($request->old_favicon)){
                unlink($request->old_favicon);
            }
            $favicon = $request->file('favicon');
            $directory = 'uploads/siteInfo/';
            $favicon_name = "favicon." . $favicon->getClientOriginalExtension();
            $favicon->move($directory, $favicon_name);
            $favicon_name = $directory.$favicon_name;

        };
        $upd = DB::table('settings')
            ->where('id', 1)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'keyword' => $request->keyword,
                'logo' => $logo_name,
                'favicon' => $favicon_name,
                'updated_at' => now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error', true);

    }

}
