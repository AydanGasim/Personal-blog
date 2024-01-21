<!-- Start Mobile Menu Area  -->
<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img class="dark-logo" src="{{ config("constants.BACKEND").$settings->logo }}" alt="Website logo">
                </a>
            </div>
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        <ul class="mainmenu">
            <li class="menu-item-has-children"><a href="{{route('index')}}">Home</a>

            </li>
            <li class="menu-item-has-children"><a href="{{route('aboutPage')}}">About</a>

            </li>

            <li class="menu-item-has-children"><a href="#">Blog</a>
                <ul class="axil-submenu">
                    @foreach($categories as $category)
                        <li>
                            <a class="hover-flip-item-wrapper"
                               href="{{route('categoryDetail', [$category->slug])}}">
                                            <span class="hover-flip-item">
                <span data-text="{{ $category->title}}">{{ $category->title }}</span>
                                            </span>
                            </a>
                        </li>

                    @endforeach
                </ul>

            </li>
            <li class="menu-item-has-children"><a href="{{ route('servicesPage') }}">Services</a>

            </li>
            <li class="menu-item-has-children"><a href="{{route('contactPage')}}">Contact</a>
            </li>
        </ul>
    </div>
</div>
<!-- End Mobile Menu Area  -->
