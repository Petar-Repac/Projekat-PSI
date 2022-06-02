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
    <!-- Header -->
    <header id="header" class="alt">
        <a class="logo" href="index.html">
            <img src="{{ asset('images/tobago-white-stroke.png') }}" alt="Tobago">
        </a>


        <nav id="nav">

            <ul>
                <li class="current"><a href="{{ route('all') }}">Početna</a></li>
                <li><a href="uputstvo.html">Uputstvo za korišćenje prototipa</a></li>
                <li><a href="o-nama.html">O Kavujliji</a></li>
            </ul>
        </nav>

        @if (Route::has('login'))
            <ul class="actions">

                @auth
                    <span>
                        @if (Auth::user()->isAdmin())
                            Admin:
                        @elseif (Auth::user()->isMod())
                            Mod:
                        @else
                            Korisnik:
                        @endif
                        {{ Auth::user()->username }}
                    </span>


                    <li><a href="{{ url('/writepost') }}" class="button primary medium fit js-forbid-guest">Napiši
                            definiciju</a></li>
                    <li class="user">
                        <form method="POST" class="invis" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="Odjavi me" />
                        </form>
                    @else
                    <li class="guest"><a href="{{ route('login') }}" class="button medium fit">Prijava</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="guest">
                            <a href="{{ route('register') }}" class="button medium fit">
                                Registracija</a>
                        </li>
                    @endif
                @endauth
            </ul>
        @endif
    </header>

    @yield('content')

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
