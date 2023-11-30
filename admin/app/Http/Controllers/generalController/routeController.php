<?php

namespace App\Http\Controllers\generalController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;

class routeController extends Controller
{
    public function index(){
        return view('index');
    }
}
