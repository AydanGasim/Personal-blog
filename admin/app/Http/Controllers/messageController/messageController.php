<?php

namespace App\Http\Controllers\messageController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class messageController extends Controller
{
    public function messageList(){
        $messageData = DB::table('message')->get();
        View::share([
            'messages'=>$messageData
        ]);
        return view('messages.messageList');
    }


public function messageUpdatePost(Request $request){

    $request->validate([

        'status' => 'required',

    ]);

    $add = DB::table('message')
        ->where('id', $request->id)
        ->update([
            'status'=>$request->status,
            'updated_at'=> now(),
        ]);
    return redirect()->back()->with($add ? 'success' : 'error',true);
}

public function messageView(Request $request)
{

    $message = DB::table('message')->where('id', $request->id)->first();
    return response()->json([

        'status' => $message ? true : null,
        'message' => $message,

    ]);
}
}
