<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class socialController extends Controller
{
    public function socialView(){
        $socialData = DB::table('settings')->where('id',1)->first();
        return view('settings.social',compact('socialData'));
    }


    public function socialEditPost(Request $request)
    {
        $request->validate([
            'social_facebook' => 'required|url',
            'social_instagram' => 'required|url',
            'social_github' => 'required|url',
            'social_linkedin' => 'required|url',
        ]);


        $upd = DB::table('settings')
            ->where('id', 1)
            ->update([
                'social_facebook' => $request->social_facebook,
                'social_instagram' => $request->social_instagram,
                'social_github' => $request->social_github,
                'social_linkedin' => $request->social_linkedin,
                'updated_at' => now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error', true);

    }
}
