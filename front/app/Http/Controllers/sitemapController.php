<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class sitemapController extends Controller
{
    public function index()
    {
        $categories = DB::table('category')->where(["status"=>"1"])->get();
        $blogs = DB::table('blog')->where(["status"=>"1"])->get();

        View::share([
           'categories' => $categories,
           'blogs' => $blogs,
        ]);
        return response()->view('sitemap')->header('Content-Type', 'text/xml');
    }
}
