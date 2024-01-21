<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings = DB::table('settings')->find(1);
        $categories = DB::table('category')->where('status','1')->get();
        $portfolioCategories = DB::table('portfolio_category')->where('status','1')->get();

     ;


        View::share([
            'settings'=>$settings,
            'categories'=>$categories,
            'portfolioCategories'=> $portfolioCategories,
        ]);

    }





}
