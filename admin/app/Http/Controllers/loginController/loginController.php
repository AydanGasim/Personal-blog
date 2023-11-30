<?php

namespace App\Http\Controllers\loginController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function myProfile(){

        return view('profile.myProfile');
    }


    public function updatePassword(Request $request)
    {


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|different:old_password|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]+$/',
        ]);


        $user = DB::table('users')->find(Auth::id());


        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', true);
        }


        $update = DB::table('users')
            ->where('id',$user->id)
            ->update([
            'password' => Hash::make($request->new_password),
                'updated_at'=> now()
        ]);

        return redirect()->back()->with($update ? 'success' : 'error', true);
    }



    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => "1"])) {
            return redirect()->route('index')->with('welcome_login', true);
        }

        return redirect()->back()->with('login_err', true);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
