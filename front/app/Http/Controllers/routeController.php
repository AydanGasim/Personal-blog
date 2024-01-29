<?php

namespace App\Http\Controllers;

use App\Mail\generalMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class routeController extends Controller
{
    public function __construct(){
        $recentBlogs = $this->recentBlogs();
        $popularBlogs = $this->popularBlogs();
        view::share([
            'recentBlogs'=>$recentBlogs,
            'popularBlogs'=>$popularBlogs,
        ]);
    }

    public function index()
    {
        $blogs=DB::table('blog')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where([
                "blog.status"=>"1",
                "category.status"=>"1"
            ])
            ->select('blog.*', 'category.slug AS category_slug','category.title AS category_title',)
            ->get();
        $posts = DB::table('instagram')->get();
        return view('index',compact('blogs','posts'));
    }


    public function aboutPage()
    {
        return view('about');
    }

    public function contactPage()
    {
        return view('contact');
    }

    public function servicesPage()
    {
        $services = DB::table('services')->where('status','1')->get();
        return view('services',compact('services'));
    }
    public function categoryDetail($slug){
        $category=DB::table('category')->where(["status"=>"1","slug"=>$slug])->first();
        if($category){
            $blog=DB::table('blog')
                ->where(["status"=>"1","category_id"=>$category->id])
                ->orderBy('created_at', 'desc')
                ->get();

            View::share([
                'blogs'=>$blog,
                'category'=>$category,
            ]);
            return view('blogs');
        }
        else{
            return redirect()->back();
        }

    }

    public function portfolioCategoryDetail($slug){
        $category=DB::table('portfolio_category')->where(["status"=>"1","slug"=>$slug])->first();
        if($category){
            $portfolio=DB::table('portfolio')
                ->where(["status"=>"1","category_id"=>$category->id])
                ->orderBy('created_at', 'desc')
                ->get();

            View::share([
                'portfolios'=>$portfolio,
                'category'=>$category,
            ]);
            return view('portfolios');
        }
        else{
            return redirect()->back();
        }

    }


    public function blogPage($slug)
    {

        $blogData=DB::table('blog')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->select('blog.*', 'category.slug AS category_slug','category.title AS category_title',)
            ->where([
                "category.status"=>"1",
                "blog.status"=>"1",
                "blog.slug"=>$slug
            ])
            ->first();

        if($blogData){
            $count = $blogData->read_count;
            DB::table('blog')
                ->where(["status"=>"1","slug"=>$slug])
                ->update(['read_count'=>$count+1]);
            return view('blog',compact('blogData'));

        }

        return redirect()->back();

    }
    public function portfolioPage($slug)
    {

        $portfolioData=DB::table('portfolio')
            ->join('portfolio_category', 'portfolio_category.id', '=', 'portfolio.category_id')
            ->select('portfolio.*', 'portfolio_category.slug AS category_slug','portfolio_category.title AS category_title',)
            ->where([
                "portfolio_category.status"=>"1",
                "portfolio.status"=>"1",
                "portfolio.slug"=>$slug
            ])
            ->first();

        return view('portfolio',compact('portfolioData'));

    }

    public function search($query){
        $query = strip_tags(trim(htmlspecialchars($query)));
        $blogs = DB::table('blog')
            ->where('title', 'like', '%'.$query.'%')
            ->orWhere('text_content', 'like', '%'.$query.'%')
            ->get();
        View::share([
            'blogs'=>$blogs
        ]);
        return view('search');
    }


    private function popularBlogs(){
        return DB::table('blog')
            ->where('status', '1')
            ->orderBy('read_count', 'desc')
            ->limit(3)
            ->get();
    }


    private function recentBlogs(){
        return DB::table('blog')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where("blog.status","1")
            ->select('blog.*', 'category.slug AS category_slug','category.title AS category_title',)
            ->orderBy('blog.created_at', 'desc')
            ->limit(2)
            ->get();
    }

    public function addMessage(Request $request){
        $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'reason' => 'required|in:0,1,2,3',
        ]);
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => '6LcY41QpAAAAADqLDxb6BzGnBF0D8B4WA6I0uTkm',
            'response' => \request('recaptcha_response')
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        if (!$resultJson->success)
            return redirect()->back()->with('errorRecaptcha', true);

        $ins = DB::table('message')->insert([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'message' => $request->message,
            'reason' => $request->reason,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($ins){
            $mailData = [
                'name' =>  $request->full_name,
                'view' => "emails.message-accepted",
                "subject"=> "You have contacted me"
            ];
            Mail::to(strtolower($request->email))->queue(new generalMail($mailData));
        }



        return redirect()->back()->with($ins ? 'success_contact' : 'error_contact', true);
    }




}
