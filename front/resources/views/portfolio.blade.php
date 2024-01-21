@extends('layouts.master')
@section('title',$portfolioData->title )
@section('description', mb_substr(strip_tags($portfolioData->text_content),0,255) )
@section('img', config("constants.BACKEND").$portfolioData->image )
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
                                            <h1 class="title">{{ $portfolioData->title }}</h1>
                                            <!-- Post Meta  -->
                                            <div class="post-meta-wrapper">
                                                <div class="post-meta">

                                                    <div class="content">
                                                        <ul class="post-meta-list">
                                                            <li>{{ substr($portfolioData->created_at,0,10) }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="social-share-transparent justify-content-end">
                                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('portfolioPage',[$portfolioData->slug]) }}"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a target="_blank" href="http://twitter.com/share?text={{ $portfolioData->title }}&url={{ route('portfolioPage',[$portfolioData->slug]) }}&hashtags={{ $portfolioData->category_title }}"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('portfolioPage',[$portfolioData->slug]) }}"><i class="fab fa-linkedin"></i></a></li>
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
                        <img style="height: auto; width: 100% !important;" src=" {{ config("constants.BACKEND").$portfolioData->image }}" alt="{{ $portfolioData->title }}" />
                        {!! $portfolioData->text_content !!}
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
    <!-- End Post Single Wrapper  -->


@endsection
