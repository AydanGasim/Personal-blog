<!-- Start Categories List  -->
<div class="axil-categories-list axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row align-items-center mb--30">
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                <div class="section-title">
                    <h2 class="title">Categories</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Start List Wrapper  -->
                <div class="list-categories d-flex flex-wrap">

                    <!-- Start Single Category  -->
                    @foreach($categories as $category)
                    <div class="single-cat">
                        <div class="inner">
                            <a href="{{ route('categoryDetail',[$category->slug]) }}">
                                <div class="thumbnail">
                                    <img src="{{ config("constants.BACKEND").$category->image }}" alt="post categories images" style="height: 120px">
                                </div>
                                <div class="content">
                                    <h5 class="title">{{ $category->title }} </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->
                    @endforeach

                </div>
                <!-- Start List Wrapper  -->
            </div>
        </div>
    </div>
</div>
<!-- Start Categories List  -->
