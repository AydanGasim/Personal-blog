<!DOCTYPE html>
<html class="no-js" lang="en">
@include('layouts.head')
<body>
<div class="main-wrapper">
    @include('layouts.menu-mobile')
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
@include('layouts.scripts')

</body>
</html>
