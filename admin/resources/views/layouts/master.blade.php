<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
      data-theme="theme-default" data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template">
@include('layouts.head')
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.menu')
        <!-- Layout container -->
        <div class="layout-page">
            @include('layouts.navbar')
            <!-- Content wrapper -->
            <div class="content-wrapper">
                @yield('content')

                @include('layouts.footer')
                <div class="content-backdrop fade"></div>

            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
</div>
<!-- / Layout wrapper -->
@include('layouts.js')
</body>
</html>
