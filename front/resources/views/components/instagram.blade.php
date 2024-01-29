<div class="axil-categories-list axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row align-items-center mb--30">
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                <div class="section-title">
                    <h2 style="color: #014397" class="title">Instagram</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Start List Wrapper  -->
                <div class="list-categories d-flex flex-wrap">
                    @foreach($posts as $post)
                        <!-- Start Single Category  -->
                        <div class="single-cat">
                            <div class="inner">
                                <a href="{{ $post->permalink }}" target="_blank">
                                    <div class="thumbnail">
                                        <img style="height: 180px" src="{{ $post->media_url }}"
                                             alt="instagram">
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


<!-- Start Post List Wrapper  -->
