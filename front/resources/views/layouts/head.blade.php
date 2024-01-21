<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>@yield('title', $settings->title) | Aydan Gasimzadeh </title>

    <meta name="description" content="@yield('description', $settings->description)" />
    <meta name="keywords" content="<?= $settings->keyword ?>" />
    <meta property="og:url"   content="{{ (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}" />
    <meta property="og:type"  content="article" />
    <meta property="og:title" content="@yield('title', $settings->title)" />
    <meta property="og:description" content="@yield('description', $settings->description)" />
    <meta property="og:image" content="@yield('img', config("constants.BACKEND").$settings->favicon )" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ config("constants.BACKEND").$settings->favicon }}">
    <script src="https://kit.fontawesome.com/40827d0aa7.js" crossorigin="anonymous"></script>
    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @yield('css')
</head>
