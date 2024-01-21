<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class helperController extends Controller
{
    public static function popularBlogsForCategory($category_id){
        return DB::table('blog')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where([
                'blog.status'=>'1',
                'category.status'=>'1',
                'blog.category_id'=>$category_id
            ])
            ->select('blog.*', 'category.slug AS category_slug','category.title AS category_title',)
            ->orderBy('blog.read_count', 'desc')
            ->limit(3)
            ->get();
    }
}
