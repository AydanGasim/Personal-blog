<?php

use App\Http\Controllers\blogController\blogController;
use App\Http\Controllers\generalController\routeController;
use App\Http\Controllers\loginController\loginController;
use App\Http\Controllers\messageController\messageController;
use App\Http\Controllers\portfolioController\portfolioController;
use App\Http\Controllers\services\serviceController;
use App\Http\Controllers\settings\aboutController;
use App\Http\Controllers\settings\contactController;
use App\Http\Controllers\settings\siteInfoController;
use App\Http\Controllers\settings\socialController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isLogout;


Route::middleware([isLogout::class])->group(function () {
    Route::controller(routeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(loginController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(loginController::class)->group(function () {
        Route::get('/myProfile', 'myProfile')->name('myProfile');
        Route::post('/myProfile', 'updatePassword')->name('updatePassword');
    });
    Route::prefix('settings')->group(function () {
        Route::controller(aboutController::class)->group(function () {
            Route::get('/about', 'aboutView')->name('about');
            Route::post('/about', 'aboutEditPost')->name('aboutEditPost');
        });
        Route::controller(contactController::class)->group(function () {
            Route::get('/contact', 'contactView')->name('contact');
            Route::post('/contact', 'contactEditPost')->name('contactEditPost');
        });
        Route::controller(siteInfoController::class)->group(function () {
            Route::get('/site-info', 'siteInfoView')->name('siteInfo');
            Route::post('/site-info', 'siteInfoEditPost')->name('siteInfoEditPost');
        });
        Route::controller(socialController::class)->group(function () {
            Route::get('/social', 'socialView')->name('social');
            Route::post('/social', 'socialEditPost')->name('socialEditPost');
        });
    });
    Route::prefix('blog')->group(function () {
        Route::controller(blogController::class)->group(function () {
            Route::get('/category', 'categoryList')->name('categoryList');
            Route::get('/category_add', 'addCategory')->name('categoryAdd');
            Route::post('/category_add', 'addCategoryPost')->name('categoryAddPost');
            Route::get('/category-delete/{id}', 'categoryDelete')->name('categoryDelete');
            Route::post('/category-edit', 'categoryEditPost')->name("categoryEditPost");
            Route::get('/blog', 'blogList')->name('blog');
            Route::get('/add', 'addBlog')->name('blogAdd');
            Route::post('/add', 'addBlogPost')->name('blogAddPost');
            Route::get('/blog-delete/{id}', 'blogDelete')->name('blogDelete');
            Route::get('/edit/{id}', 'blogEditView')->name('blogEditView');
            Route::post('/edit/{id}', 'blogEditPost')->name('blogEditPost');

            //ajax
            Route::post('/category-view', 'categoryView');
            Route::post('/blog-view', 'blogView');


        });
    });
    Route::prefix('portfolio')->group(function () {
        Route::controller(portfolioController::class)->group(function () {
            Route::get('/portfolio-category', 'categoryList')->name('portfolioCategoryList');
            Route::get('/portfolio-category-add', 'addCategory')->name('portfolioCategoryAdd');
            Route::post('/portfolio-category-add-post', 'addCategoryPost')->name('portfolioCategoryAddPost');
            Route::get('/portfolio-category-delete/{id}', 'categoryDelete')->name('portfolioCategoryDelete');
            Route::post('/portfolio-category-edit', 'categoryEditPost')->name("portfolioCategoryEditPost");
            Route::get('/portfolio-list', 'portfolioList')->name('portfolioList');
            Route::get('/portfolio-add', 'addPortfolio')->name('portfolioAdd');
            Route::post('/portfolio-add', 'addPortfolioPost')->name('portfolioAddPost');
            Route::get('/portfolio-delete/{id}', 'portfolioDelete')->name('portfolioDelete');
            Route::get('/portfolio-edit/{id}', 'portfolioEditView')->name('portfolioEditView');
            Route::post('/portfolio-edit/{id}', 'portfolioEditPost')->name('portfolioEditPost');

            //ajax
            Route::post('/portfolio-category-view', 'categoryView');
            Route::post('/portfolio-view', 'portfolioView');


        });

    });
    Route::prefix('services')->group(function () {
        Route::controller(serviceController::class)->group(function () {
            Route::get('/service', 'serviceList')->name('service');
            Route::get('/addService', 'addService')->name('addService');
            Route::post('/addService', 'addServicePost')->name('serviceAddPost');
            Route::get('/service-delete/{id}', 'serviceDelete')->name('serviceDelete');
            Route::post('/service-edit', 'serviceEditPost')->name("serviceEditPost");

            //ajax
            Route::post('/service-view', 'serviceView');


        });

    });

    Route::prefix('messages')->group(function () {
        Route::controller(messageController::class)->group(function () {
            Route::get('/message', 'messageList')->name('message');
            Route::post('/message-update', 'messageUpdatePost')->name("messageUpdatePost");

            //ajax
            Route::post('/message-view', 'messageView');

        });
    });

});
Route::middleware([isLogin::class])->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost')->name('loginPost');
    });

});

