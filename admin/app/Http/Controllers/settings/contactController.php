<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactController extends Controller
{
    public function contactView()
    {
        $contactData = DB::table('settings')->where('id', 1)->first();
        return view('settings.contact', compact('contactData'));
    }

    public function contactEditPost(Request $request)
    {
        $request->validate([
            'contact_phone' => 'required',
            'contact_email' => 'required',
        ]);


        $upd = DB::table('settings')
            ->where('id', 1)
            ->update([
                'contact_phone' => $request->contact_phone,
                'contact_email' => $request->contact_email,
                'updated_at' => now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error', true);

    }


}


