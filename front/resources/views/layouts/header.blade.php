<!-- Start Header -->
<header class="header axil-header  header-light header-sticky ">
    <div class="header-wrap">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img class="dark-logo" src="{{ config("constants.BACKEND").$settings->logo }}" alt="Website logo">
{{--                        <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Blogar logo">--}}
                    </a>
                </div>
            </div>

            <div class="col-xl-6 d-none d-xl-block">
                <div class="mainmenu-wrapper">
                    <nav class="mainmenu-nav">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            <li class="menu-item-has-children"><a href="{{ route('index') }}">Home</a>

                            </li>

                            <li class="menu-item-has-children"><a href="{{ route('aboutPage') }}">About</a>

                            </li>

                            <li class="menu-item-has-children"><a href="#">Blog</a>

                                <ul class="axil-submenu">
                                    @foreach($categories as $category)
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="{{ route('categoryDetail',[$category->slug]) }}">
                                                    <span class="hover-flip-item">
                        <span data-text="{{ $category->title }}">{{ $category->title }}</span>
                                                    </span>
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>



                            </li>

                            <li class="menu-item-has-children"><a href="#">Portfolio</a>

                                <ul class="axil-submenu">
                                    @foreach($portfolioCategories as $category)
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{ route('portfolioCategoryDetail',[$category->slug]) }}">
                                                    <span class="hover-flip-item">
                        <span data-text="{{ $category->title }}">{{ $category->title }}</span>
                                                    </span>
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>



                            </li>




                            <li class="menu-item-has-children"><a href="{{ route('servicesPage') }}">Services</a>

                            </li>

                            <li><a href="{{ route('contactPage') }}">Contact</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>

            <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                <div class="header-search text-end d-flex align-items-center">
                        <div class="axil-search form-group">
                            <button  type="button" onclick="searchData()" class="search-button"><i class="fal fa-search"></i></button>
                            <input type="text" id="search" class="form-control" onkeydown="handleKeyDown(event)" placeholder="Search">
                        </div>
                    <div class="mobile-search-wrapper d-sm-none d-block">

                        <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                           <div class="header-search-form">
                               <div class="axil-search form-group">
                                   <button type="button" onclick="searchData()" class="search-button"><i class="fal fa-search"></i></button>
                                   <input type="text" id="search" class="form-control" placeholder="Search" />
                               </div>
                           </div>
                    </div>

                    <!-- Start Hamburger Menu  -->
                    <div class="hamburger-menu d-block d-xl-none">
                        <div class="hamburger-inner">
                            <div class="icon"><i class="fal fa-bars"></i></div>
                        </div>
                    </div>
                    <!-- End Hamburger Menu  -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header -->
