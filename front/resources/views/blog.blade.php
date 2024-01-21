@extends('layouts.master')
@section('title',$blogData->title )
@section('description', mb_substr(strip_tags($blogData->text_content),0,255) )
@section('img', config("constants.BACKEND").$blogData->image )
@section('content')

    <!-- Start Post Single Wrapper  -->
    <div class="post-single-wrapper axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Start Banner Area -->
                    <div class="banner banner-single-post post-formate post-text-only axil-section-gapBottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Start Single Slide  -->
                                    <div class="content-block">
                                        <!-- Start Post Content  -->
                                        <div class="post-content">
                                            <div class="post-cat">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="FEATURED POST">FEATURED POST</span>
                                                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <h1 class="title">{{ $blogData->title }}</h1>
                                            <!-- Post Meta  -->
                                            <div class="post-meta-wrapper">
                                                <div class="post-meta">

                                                    <div class="content">
                                                        <ul class="post-meta-list">
                                                            <li>{{ substr($blogData->created_at,0,10) }}</li>
                                                            <li>{{ $blogData->read_count }} Views</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="social-share-transparent justify-content-end">
                                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogPage',[$blogData->slug]) }}"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a target="_blank" href="http://twitter.com/share?text={{ $blogData->title }}&url={{ route('blogPage',[$blogData->slug]) }}&hashtags={{ $blogData->category_title }}"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('blogPage',[$blogData->slug]) }}"><i class="fab fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Post Content  -->
                                    </div>
                                    <!-- End Single Slide  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner Area -->

                    <div class="axil-post-details">
                        <img style="height: auto; width: 100% !important;" src=" {{ config("constants.BACKEND").$blogData->image }}" alt="{{ $blogData->title }}" />
                        {!! $blogData->text_content !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->
                    <div class="sidebar-inner">
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
                                            <h5 class="title">{{ $category->title }}</h5>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Popular</h5>
                            <!-- Start Post List  -->
                            <div class="post-medium-block">
                             @foreach($popularBlogs as $blog)
                                <!-- Start Single Post  -->
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('blogPage',[$blog->slug]) }}">
                                            <img src="{{ config("constants.BACKEND").$blog->image }}" alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a href="{{ route('blogPage',[$blog->slug]) }}">{{ $blog->title }}</a></h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>{{ substr($blog->created_at,0,10) }}</li>
                                                <li>{{ $blog->read_count }} Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Post  -->
                                @endforeach

                            </div>
                            <!-- End Post List  -->

                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
{{--                        <div class="axil-single-widget widget widget_newsletter mb--30">--}}
{{--                            <!-- Start Post List  -->--}}
{{--                            <div class="newsletter-inner text-center">--}}
{{--                                <h4 class="title mb--15">Never Miss A Post!</h4>--}}
{{--                                <p class="b2 mb--30">Sign up for free and be the first to <br /> get notified about updates.</p>--}}
{{--                                <form action="#">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" placeholder="Enter Your Email ">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-submit">--}}
{{--                                        <button class="cerchio axil-button button-rounded"><span>Subscribe</span></button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!-- End Post List  -->--}}
{{--                        </div>--}}
                        <!-- End Single Widget  -->


{{--                        <!-- Start Single Widget  -->--}}
{{--                        <div class="axil-single-widget widget widget_instagram mb--30">--}}
{{--                            <h5 class="widget-title">Instagram</h5>--}}
{{--                            <!-- Start Post List  -->--}}
{{--                            <ul class="instagram-post-list-wrapper">--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-01.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-02.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-03.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-04.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-05.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="instagram-post-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="assets/images/small-images/instagram-06.jpg" alt="Instagram Images">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <!-- End Post List  -->--}}
{{--                        </div>--}}
{{--                        <!-- End Single Widget  -->--}}

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Recent Post</h5>
                            <!-- Start Post List  -->
                            <div class="post-medium-block">
                                @foreach($recentBlogs as $blog)
                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{ route('blogPage',[$blog->slug]) }}">{{ $blog->title }}</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>{{ substr($blog->created_at,0,10) }}</li>
                                                    <li>{{ $blog->read_count }} Views</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->
                                @endforeach
                            </div>
                            <!-- End Post List  -->
                        </div>
                        <!-- End Single Widget  -->



                    </div>
                    <!-- End Sidebar Area  -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Post Single Wrapper  -->


@endsection
