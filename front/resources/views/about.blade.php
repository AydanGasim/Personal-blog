@extends('layouts.master')

@section('content')

    <!-- Start Author Area  -->
    <div class="axil-author-area axil-author-banner bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-author">
                        <h1 style="color: #825e47" class="title text-center"><a href="#0">About Me</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Author Area  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <img src="{{ config("constants.BACKEND").$settings->about_image }}" alt="">
                </div>
                <div class="col-lg-8 col-xl-">
                    <h1 style="color: #825e47" class="title text-center display-6">{{ $settings->about_title }}</h1>
                   <div>
                       {!! $settings->about_content !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.categories')

@endsection
