<?php

namespace App\Http\Controllers\generalController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class helperController extends Controller
{
    public static function getStatus($status){
        switch ($status){
            case "0":
                return '<span class="badge bg-danger">Deactivated</span>';
            case "1":
                return '<span class="badge bg-success">Active</span>';
        }
    }
    public static function getStatusMessage($status){
        switch ($status){
            case "0":
                return '<span class="badge bg-danger">Unanswered</span>';
            case "1":
                return '<span class="badge bg-success">Answered</span>';
        }
    }
    public static function getReason($status){
        switch ($status){
            case "0":
                return '<span>Other</span>';
            case "1":
                return '<span>Complaint</span>';
            case "2":
                return '<span>Learning about the details</span>';
            case "3":
                return '<span>Suggestion</span>';
        }
    }



    public static function getBlogCategoryName($id){
        $category =  DB::table('category')->where('id',$id)->first();
        return $category ? $category->title : '--';
    }

}
