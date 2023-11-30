<?php

namespace App\Http\Controllers\blogController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class blogController extends Controller
{
    public function categoryList(){

        $categoryData = DB::table('category')->get();
        View::share([
            'categories'=>$categoryData
        ]);
        return view('blog.category');


    }
    public function addCategory(){
        $categoryData = DB::table('category')->get();
        View::share([
            'categories'=>$categoryData
        ]);
        return view('blog.addCategory');
    }

    public function addCategoryPost(Request $request){
        $request->validate([
            'title' => 'required|max:500',

        ]);

        $ins = DB::table('category')->insert([
            'title'=>$request->title,
            'slug'=>Str::slug($request->name),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back()->with($ins ? 'success' : 'error',true);
    }

    public function categoryDelete($id)
    {
        $categoryData = DB::table('category')->find($id);

        if ($categoryData) {


            return redirect()->back()->with('success', DB::table('category')->where('id', $id)->delete());
        }
    }

    public function categoryEditPost(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'status' => 'required',
        ]);

        $add = DB::table('category')
            ->where('id', $request->id)
            ->update([
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'status'=>$request->status,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        return redirect()->back()->with($add ? 'success' : 'error',true);
    }

    public function categoryView(Request $request){

        $category = DB::table('category')->where('id',$request->id)->first();
        return response()->json([
//            'category'=>$category ?? [],
//            'status'=>(bool)$category,

            'status' => $category ?? null,
            'category' => $category,

        ]);
    }




    public function blogList(){
        $blogData = DB::table('blog')->get();
        View::share([
            'blogs'=>$blogData
        ]);
        return view('blog.blog');
    }



    public function addBlog(){

        $categories = DB::table('category')->get();
        return view('blog.add',compact('categories'));
    }

    public function addBlogPost(Request $request){
        $request->validate([
            'title' => 'required|max:500',
            'text_content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image = $request->file('image');
        $directory = 'uploads/blog/';
        $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
        $image->move($directory, $image_name);
        $ins = DB::table('blog')->insert([
            'category_id'=>$request->category,
            'title'=>$request->title,
            'text_content'=>$request->text_content,
            'image'=>'uploads/blog/'.$image_name,
            'slug'=>Str::slug($request->title),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back()->with($ins ? 'success' : 'error',true);
    }

    public function blogDelete($id){
        $blogData = DB::table('blog')->find($id);

        if ($blogData && file_exists($blogData->image)) {
            unlink($blogData->image);
        }

        return redirect()->back()->with($blogData ? 'success' : 'error', DB::table('blog')->where('id', $id)->delete());
    }


    public function blogEditView($id){
        $categories = DB::table('category')->get();
        $blog = DB::table('blog')->where('id',$id)->first();
        return $blog ? view('blog.blogEdit',compact('categories','blog')) : redirect()->back();
    }
    public function blogEditPost(Request $request,$id){
        $request->validate([
            'title' => 'required|max:500',
            'text_content' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image_name = $request->old_image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $directory = 'uploads/blog/';
            $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
            $image->move($directory, $image_name);
            $image_name = $directory.$image_name;
            if(file_exists($request->old_image)){
                unlink($request->old_image);
            }
        }

        $upd = DB::table('blog')
            ->where('id', $id)
            ->update([
                'category_id'=>$request->category,
                'title'=>$request->title,
                'text_content'=>$request->text_content,
                'status'=>$request->status,
                'image'=>$image_name,
                'slug'=>Str::slug($request->title),
                'updated_at'=>now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error',true);
    }

    public function blogView(Request $request){

        $blog = DB::table('blog')->where('id',$request->id)->first();
        return response()->json([
            'blog'=>$blog ?? [],
            'status'=>(bool)$blog,

        ]);
    }

}

