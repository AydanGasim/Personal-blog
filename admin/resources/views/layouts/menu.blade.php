<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

                <img src="{{asset('uploads/siteInfo/logo.png')}}" style="width: 135px !important; height: auto; object-fit: cover !important;" alt="" />

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::segment(1)== null ? 'active' : ''}}">
            <a href="{{route('index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-dashboard"></i>
                <div data-i18n="Main Page">Main Page</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(1)== "settings" ? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(1)== "settings" && Request::segment(2)== "about"? 'active' : ''}}">
                    <a href="{{route('about')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="About">About</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "settings" && Request::segment(2)== "site-info"? 'active' : ''}}">
                    <a href="{{route('siteInfo')}}" class="menu-link">
                        <div data-i18n="Site Info">Site Info</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "settings" && Request::segment(2)== "contact"? 'active' : ''}}">
                    <a href="{{route('contact')}}" class="menu-link">
                        <div data-i18n="Contact">Contact</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "settings" && Request::segment(2)== "social"? 'active' : ''}}">
                    <a href="{{route('social')}}" class="menu-link">
                        <div data-i18n="Social Networks">Social Networks</div>
                    </a>
                </li>

            </ul>

        <li class="menu-item {{ Request::segment(1)== "blog"? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-brand-blogger"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(1)== "blog" && Request::segment(2)== "category"? 'active' : ''}}">
                    <a href="{{route('categoryList')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Category List">Category list</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "blog" && Request::segment(2)== "category_add"? 'active' : ''}}">
                    <a href="{{route('categoryAdd')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Add Category">Add Category</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "blog" && Request::segment(2)== "blog"? 'active' : ''}}">
                    <a href="{{route('blog')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Blog List">Blog list</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "blog" && Request::segment(2)== "add"? 'active' : ''}}">
                    <a href="{{route('blogAdd')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Add Blog">Add Blog</div>
                    </a>
                </li>


            </ul>

        <li class="menu-item {{ Request::segment(1)== "portfolio"? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Portfolio">Portfolio</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(1)== "portfolio" && Request::segment(2)== "portfolio-category"? 'active' : ''}}">
                    <a href="{{route('portfolioCategoryList')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Category List">Category list</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "portfolio" && Request::segment(2)== "portfolio-category-add"? 'active' : ''}}">
                    <a href="{{route('portfolioCategoryAdd')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Add Category">Add Category</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "portfolio" && Request::segment(2)== "portfolio-list"? 'active' : ''}}">
                    <a href="{{route('portfolioList')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Portfolio List">Portfolio list</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(1)== "portfolio" && Request::segment(2)== "portfolio-add"? 'active' : ''}}">
                    <a href="{{route('portfolioAdd')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Add Portfolio">Add Portfolio</div>
                    </a>
                </li>


            </ul>
        <li class="menu-item {{ Request::segment(1)== "services"? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-hotel-service"></i>
                <div data-i18n="Services">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(1)== "services" && Request::segment(2)== "service"? 'active' : ''}}">
                    <a href="{{route('service')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Services List">Services list</div>
                    </a>
                </li>

                <li class="menu-item {{ Request::segment(1)== "services" && Request::segment(2)== "addService"? 'active' : ''}}">
                    <a href="{{route('addService')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Add Services">Add Services</div>
                    </a>
                </li>

            </ul>
        <li class="menu-item {{ Request::segment(1)== "messages"? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-message"></i>
                <div data-i18n="Messages">Messages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(1)== "messages" && Request::segment(2)== "message"? 'active' : ''}}">
                    <a href="{{route('message')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-message"></i>
                        <div data-i18n="Messages List">Messages list</div>
                    </a>
                </li>


            </ul>



    </ul>

</aside>
