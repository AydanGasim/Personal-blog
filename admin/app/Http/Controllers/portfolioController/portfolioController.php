<?php

namespace App\Http\Controllers\portfolioController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class portfolioController extends Controller
{
    public function categoryList()
    {

        $categoryData = DB::table('portfolio_category')->get();
        View::share([
            'categories' => $categoryData
        ]);
        return view('portfolio.portfolioCategory');


    }

    public function categoryView(Request $request)
    {

        $category = DB::table('portfolio_category')->where('id', $request->id)->first();
        return response()->json([
//            'category'=>$category ?? [],
//            'status'=>(bool)$category,

            'status' => $category ?? null,
            'category' => $category,

        ]);
    }

    public function addCategory()
    {
        $categoryData = DB::table('portfolio_category')->get();
        View::share([
            'categories' => $categoryData
        ]);
        return view('portfolio.addPortfolioCategory');
    }


    public function addCategoryPost(Request $request)
    {
        $request->validate([
            'title' => 'required|max:500',
        ]);


        $ins = DB::table('portfolio_category')->insert([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($ins ? 'success' : 'error', true);
    }


    public function categoryDelete($id)
    {
        $categoryData = DB::table('portfolio_category')->find($id);

        if ($categoryData) {
            return redirect()->back()->with(DB::table('portfolio_category')->where('id', $id)->delete() ? "success" : "error", true);
        }


    }


    public function categoryEditPost(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'status' => 'required',

        ]);

        $add = DB::table('portfolio_category')
            ->where('id', $request->id)
            ->update([
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'status'=>$request->status,
                'updated_at'=> now(),
            ]);
        return redirect()->back()->with($add ? 'success' : 'error',true);
    }


    public function portfolioList(){
        $portfolioData = DB::table('portfolio')->get();
        View::share([
            'portfolios'=>$portfolioData
        ]);
        return view('portfolio.portfolio');
    }

    public function portfolioView(Request $request){

        $portfolio = DB::table('portfolio')->where('id',$request->id)->first();
        return response()->json([
            'portfolio'=>$portfolio ?? [],
            'status'=>(bool)$portfolio,

        ]);
    }

    public function addPortfolio(){

        $categories = DB::table('portfolio_category')->get();
        return view('portfolio.addPortfolio',compact('categories'));
    }

    public function addPortfolioPost(Request $request){
        $request->validate([
            'title' => 'required|max:500',
            'description' => 'required',
            'text_content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image = $request->file('image');
        $directory = 'uploads/portfolio/';
        $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
        $image->move($directory, $image_name);
        $ins = DB::table('portfolio')->insert([
            'category_id'=>$request->category,
            'title'=>$request->title,
            'description'=>$request->description,
            'text_content'=>$request->text_content,
            'image'=>'uploads/portfolio/'.$image_name,
            'slug'=>Str::slug($request->title),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back()->with($ins ? 'success' : 'error',true);
    }

    public function portfolioDelete($id){
        $portfolioData = DB::table('portfolio')->find($id);

        if ($portfolioData && file_exists($portfolioData->image)) {
            unlink($portfolioData->image);
        }

        return redirect()->back()->with($portfolioData ? 'success' : 'error', DB::table('portfolio')->where('id', $id)->delete());
    }

    public function portfolioEditView($id){
        $categories = DB::table('portfolio_category')->get();
        $portfolio = DB::table('portfolio')->where('id',$id)->first();
        return $portfolio ? view('portfolio.portfolioEdit',compact('categories','portfolio')) : redirect()->back();
    }
    public function portfolioEditPost(Request $request,$id){
        $request->validate([
            'title' => 'required|max:500',
            'description' => 'required',
            'text_content' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:1024',
        ]);
        $image_name = $request->old_image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $directory = 'uploads/portfolio/';
            $image_name =  Str::slug($request->title)."-".rand(10000, 99999)  . "." . $image->getClientOriginalExtension();
            $image->move($directory, $image_name);
            $image_name = $directory.$image_name;
            if(file_exists($request->old_image)){
                unlink($request->old_image);
            }
        }

        $upd = DB::table('portfolio')
            ->where('id', $id)
            ->update([
                'category_id'=>$request->category,
                'title'=>$request->title,
                'text_content'=>$request->text_content,
                'description'=>$request->description,
                'status'=>$request->status,
                'image'=>$image_name,
                'slug'=>Str::slug($request->title),
                'updated_at'=>now(),
            ]);
        return redirect()->back()->with($upd ? 'success' : 'error',true);
    }
}
