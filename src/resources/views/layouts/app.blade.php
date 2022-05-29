<!-- Autor: Vukašin Stepanović & Petar Repac -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/vendor/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pocetna.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/base.css') }}">
</head>

<body>
    <main id="main" class="wrapper">
        <div class="inner">
            @yield('content')
        </div>
    </main>


    <script src="{{ asset('/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/browser.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/util.js') }}"></script>
    <script src="{{ asset('/vendor/js/main.js') }}"></script>

    <script src="{{ asset('/vendor/js/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/xfetch.js') }}"></script>
    <script src="{{ asset('js/api.js') }}"></script>

    <script>
        showDialog({!! session('dialog') !!});
    </script>

    @yield('scripts')
</body>

</html>
