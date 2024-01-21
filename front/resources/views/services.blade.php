@extends('layouts.master')

@section('content')

    <!-- Start Trending Post Area  -->
    <div class="axil-trending-post-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Start Axil Tab Content  -->
                    <div class="tab-content">

                        <!-- Single Tab Content  -->
                        <div class="row trend-tab-content tab-pane fade show active" id="trendone" role="tabpanel" aria-labelledby="trend-one">
                            <div class="col-lg-8">
                                @foreach($services as $key=>$service)
                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list {{ $key==0  ? 'is-active' : ''}}">
                                        <div class="post-inner">
                                            <span class="post-order-list">{{ $key + 1 < 10 ? '0'.($key + 1) : $key + 1  }}</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{ $service->title }}">{{ $service->title }}</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="title">{!! $service->description !!}</p>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a href="#0">
                                                <img src="{{ config('constants.BACKEND').$service->image }}" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->
                                @endforeach
                            </div>
                        </div>
                        <!-- Single Tab Content  -->
                    </div>
                    <!-- End Axil Tab Content  -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Trending Post Area  -->


@endsection
