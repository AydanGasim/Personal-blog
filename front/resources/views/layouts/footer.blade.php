<!-- Start Footer Area  -->
<div class="axil-footer-area axil-footer-style-1 footer-variation-2">
    <div class="footer-mainmenu">
        <div class="container">

        </div>
    </div>

    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img style="width: auto!important; height: 100px!important;" src="{{ config('constants.BACKEND').$settings->logo}}"    alt=""/>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">
                    <!-- Start Post List  -->
                    <div class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                        <h5 class="follow-title mb--0 mr--20">Follow Me</h5>
                        <ul class="social-icon color-tertiary md-size justify-content-start">
                            <li><a target="_blank" href="{{ $settings->social_facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $settings->social_instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a target="_blank" href="{{ $settings->social_github}}"><i class="fab fa-github"></i></a></li>
                            <li><a target="_blank" href="{{ $settings->social_linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Post List  -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->

    <!-- Start Copyright Area  -->
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8">
                    <div class="copyright-left">
                        <ul class="mainmenu justify-content-start">
                            <li>
                                <a class="hover-flip-item-wrapper" href="{{route('contactPage')}}">
                                            <span class="hover-flip-item">
                                        <span data-text="Contact Me">Contact Me</span>
                                            </span>
                                </a>
                            </li>
                            <li>
                                <a class="hover-flip-item-wrapper" href="{{route('aboutPage')}}">
                                            <span class="hover-flip-item">
                                        <span data-text="About Me">About Me</span>
                                            </span>
                                </a>
                            </li>
                            <li>
                                <a class="hover-flip-item-wrapper" href="{{route('servicesPage')}}">
                                            <span class="hover-flip-item">
                                        <span data-text="Services">Services</span>
                                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="copyright-right text-start text-md-end mt_sm--20">
                        <p class="b3"> &copy; {{date('Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</div>
<!-- End Footer Area  -->
