@extends('layouts.master')
@section('content')
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>


        <!-- Start Featured Area  -->
        <div class="axil-featured-post axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
                <div class="row">
                    @foreach($recentBlogs as $blog)
                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column axil-control post-horizontal  thumb-border-rounded">
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{ $blog->category_title }}">{{ $blog->category_title }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a href="{{ route('blogPage',[$blog->slug]) }}">{{ $blog->title }}</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">

                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">

                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{ substr($blog->created_at,0,10) }}</li>
                                            <li>{{ $blog->read_count }} Views</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="{{ route('blogPage',[$blog->slug]) }}">
                                    <img style="width: 300px !important;" src="{{ config('constants.BACKEND').$blog->image}}" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Post  -->
                </div>
            </div>
        </div>
        <!-- End Featured Area  -->

        <!-- Start Tab Area  -->
        <div class="axil-tab-area axil-section-gap bg-color-white">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- End Tab Area  -->

     @include('components.categories')

        <!-- Start Post Grid Area  -->
        <div class="axil-post-grid-area axil-section-gap bg-color-grey">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Most Popular</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="axil-tab-button nav nav-tabs mt--20" role="tablist">
                            @foreach($categories as $key=>$category)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key==0 ? 'active' : '' }}" id="grid-{{ $category->slug }}" data-bs-toggle="tab" href="#grid{{ $category->slug }}" role="tab" aria-controls="grid-{{ $category->slug }}" aria-selected="{{ $key==0 ? 'true' : 'false' }}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- Start Tab Content  -->
                        <div class="grid-tab-content tab-content mt--10">
                            @foreach($categories as $key=>$category)
                                @php
                                    $blog = \App\Http\Controllers\helperController::popularBlogsForCategory($category->id);
                                @endphp
                            <!-- Start Single Tab Content  -->
                            <div class="single-post-grid tab-pane fade {{ $key==0 ? 'show active' : '' }}" id="grid{{ $category->slug }}" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                                        <!-- Start Post Grid  -->
                                        <div class="content-block post-grid post-grid-large mt--30">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('blogPage',[$blog[0]->slug]) }}">
                                                    <img src="{{ config('constants.BACKEND').$blog[0]->image }}" alt="{{ $blog[0]->slug }}">
                                                </a>
                                            </div>
                                            <div class="post-grid-content">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{ $blog[0]->category_title }}">{{ $blog[0]->category_title }}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h3 class="title"><a href="{{ route('blogPage',[$blog[0]->slug]) }}">{{ $blog[0]->title }}</a></h3>
                                                    <div class="post-meta-wrapper">
                                                        <div class="post-meta">
                                                            <div class="content">
                                                                <ul class="post-meta-list">
                                                                    <li>{{ substr($blog[0]->created_at,0,10) }}</li>
                                                                    <li>{{ $blog[0]->read_count }} Views</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <ul class="social-share-transparent justify-content-end">
                                                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogPage',[$blog[0]->slug]) }}"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a target="_blank" href="http://twitter.com/share?text={{ $blog[0]->title }}&url={{ route('blogPage',[$blog[0]->slug]) }}&hashtags={{ $blog[0]->category_title }}"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('blogPage',[$blog[0]->slug]) }}"><i class="fab fa-linkedin"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Post Grid  -->
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                <!-- Start Post Grid  -->
                                                <div class="content-block post-grid mt--30">
                                                    <div class="post-thumbnail">
                                                        <a href="{{ route('blogPage',[$blog[1]->slug]) }}">
                                                            <img src="{{ config('constants.BACKEND').$blog[1]->image }}" alt="{{ $blog[1]->slug }}">
                                                        </a>
                                                    </div>
                                                    <div class="post-grid-content">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="{{ $blog[1]->category_title }}">{{ $blog[1]->category_title }}</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a href="{{ route('blogPage',[$blog[1]->slug]) }}">{{ $blog[1]->title }}</a></h4>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Post Grid  -->
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                <!-- Start Post Grid  -->
                                                <div class="content-block post-grid mt--30">
                                                    <div class="post-thumbnail">
                                                        <a href="{{ route('blogPage',[$blog[2]->slug]) }}">
                                                            <img src="{{ config('constants.BACKEND').$blog[2]->image }}" alt="{{ $blog[2]->slug }}">
                                                        </a>
                                                    </div>
                                                    <div class="post-grid-content">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="{{ $blog[2]->category_title }}">{{ $blog[2]->category_title }}</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a href="{{ route('blogPage',[$blog[2]->slug]) }}">{{ $blog[2]->title }}</a></h4>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Post Grid  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab Content  -->
                            @endforeach

                        </div>
                        <!-- End Tab Content  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Post Grid Area  -->

        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">

                        <!-- Start Post List  -->
                        @foreach($blogs as $blog)
                        <div class="content-block post-list-view axil-control is-active mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('blogPage',[$blog->slug]) }}">
                                    <img src="{{ config("constants.BACKEND").$blog->image }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{ $blog->category_title }}">{{ $blog->category_title }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a href="{{ route('blogPage',[$blog->slug]) }}">{{ $blog->title }}</a></h4>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">

                                            <ul class="post-meta-list">
                                                <li>{{ substr($blog->created_at,0,10) }}</li>
                                                <li>{{ $blog->read_count }} Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Post List  -->



                    </div>
                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_categories mb--30">
                            <ul>
                                @foreach($categories as $category)
                                    <li class="cat-item">
                                        <a href="{{ route('categoryDetail',[$category->slug]) }}" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{ config("constants.BACKEND").$category->image }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title" style="font-size: 14px">{{ $category->title }}</h5>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->

{{--        <!-- Start Instagram Area  -->--}}
{{--        <div class="axil-instagram-area axil-section-gap bg-color-grey">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="section-title">--}}
{{--                            <h2 class="title">Instagram</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mt--30">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <ul class="instagram-post-list">--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-01.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-02.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-03.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-04.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-05.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="single-post">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="assets/images/small-images/instagram-md-06.jpg" alt="Instagram Images">--}}
{{--                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Instagram Area  -->--}}



        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

        @include('components.instagram')
@endsection
