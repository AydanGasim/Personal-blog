<?php


use App\Http\Controllers\routeController;
use App\Http\Controllers\sitemapController;
use Illuminate\Support\Facades\Route;


Route::controller(routeController::class)->group(function () {
    Route::get('/',  'index')->name("index");
    Route::get('/about',  'aboutPage')->name("aboutPage");
    Route::get('/search/{query}',  'search')->name("searchPage");
    Route::get('/contact',  'contactPage')->name("contactPage");
    Route::post('/submit-message',  'addMessage')->name("addMessage");
    Route::get('/services',  'servicesPage')->name("servicesPage");
    Route::get('/category/{slug}',  'categoryDetail')->name("categoryDetail");
    Route::get('/portfolio-category/{slug}',  'portfolioCategoryDetail')->name("portfolioCategoryDetail");
    Route::get('/blog/{slug}',  'blogPage')->name("blogPage");
    Route::get('/portfolio/{slug}',  'portfolioPage')->name("portfolioPage");
});
Route::controller(sitemapController::class)->group(function () {
    Route::get('/sitemap.xml',  'index');
});





