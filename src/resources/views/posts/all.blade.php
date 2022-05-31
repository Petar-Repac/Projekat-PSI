<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <!-- Header -->
    <header id="header" class="alt">
        <a class="logo" href="index.html">
            <img src="{{ asset('images/tobago-white-stroke.png') }}" alt="Tobago">
        </a>

        <nav id="nav">
            <ul>
                <li class="current"><a href="index.html">Početna</a></li>
                <li><a href="uputstvo.html">Uputstvo za korišćenje prototipa</a></li>
                <li><a href="o-nama.html">O Kavujliji</a></li>
            </ul>
        </nav>
    </header>


    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Search -->
        <section id="search" class="wrapper style2">
            <div class="inner">
                <div class="spotlights">
                    <div class="spotlight">
                        <h1>Pretraga</h1>


                        <form method="GET" action="#">
                            <div class="row gtr-uniform">

                                <!-- Break -->
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-1" name="type" checked>
                                    <label for="radio-1">Najnovije</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-2" name="type" checked>
                                    <label for="radio-2">Najbolje</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-3" name="type">
                                    <label for="radio-3">Kontroverzno</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-4" name="type">
                                    <label for="radio-4">Najgore</label>
                                </div>
                                <!-- Break -->
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-ds" name="state" checked>
                                    <label for="radio-ds">Dvorana slavnih</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-ci" name="state">
                                    <label for="radio-ci">Čistilište</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-sv" name="state">
                                    <label for="radio-sv">Sve</label>
                                </div>
                                <!-- Break -->
                                <div class="col-6 col-12-xsmall">
                                    <input type="text" name="keywords" id="demo-name" value="" placeholder="Ključne reči" />
                                </div>
                                <div class="col-6">
                                    <ul class="actions">
                                        <li><button type="submit" class="primary">Pretraži</button></li>
                                    </ul>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </section>
        <!-- One -->
        <div class="row">
            <div class="col-9 col-12-medium">
                <!-- One -->
                <section id="one" class="wrapper">
                    <div class="inner">
                        <div class="spotlights">

                            @foreach ($posts as $post)
                                <!-- Definicija -->
                                <div class="spotlight post" id="{{ $post->idPost }}">
                                    <div class="content">
                                        <h2> <a href="/posts/{{ $post->idPost }}">{{ $post->heading }}</a></h2>
                                        <p> {{ $post->content }} </p>
                                        <div class='row'>
                                            <div class="col-8">
                                                <ul class="actions">
                                                    <!-- Vote forma-->
                                                    @if (Auth::check())
                                                        <form method="POST" class="invis"
                                                            action="{{ route('vote') }}">
                                                            @csrf
                                                            <li><input type="hidden" id="idPost" name="idPost"
                                                                    value="{{ $post->idPost }}" /> </li>

                                                            @if (isset($post->userVote) && $post->userVote == 1)
                                                                <li> <button class="voted button like" type="submit"
                                                                        name="value" value="0" class="btn btn-primary">
                                                                        <span class="icon fa-plus-circle"></span>
                                                                        {{ $post->upvotes }}
                                                                    </button></li>
                                                            @else
                                                                <li> <button type="submit" class="button like"
                                                                        name="value" value="1" class="btn btn-primary">
                                                                        <span class="icon fa-plus-circle"></span>
                                                                        {{ $post->upvotes }}
                                                                    </button> </li>
                                                            @endif


                                                            @if (isset($post->userVote) && $post->userVote == -1)
                                                                <li> <button type="submit" class="voted button dislike"
                                                                        name="value" value="0" class="btn btn-primary">
                                                                        <span class="icon fa-minus-circle"></span>
                                                                        {{ $post->downvotes }}
                                                                    </button></li>
                                                            @else
                                                                <li> <button type="submit" class="button dislike"
                                                                        name="value" value="-1" class="btn btn-primary">
                                                                        <span class="icon fa-minus-circle"></span>
                                                                        {{ $post->downvotes }}
                                                                    </button></li>
                                                            @endif
                                                            <li><a href="/posts/{{ $post->idPost }}#comment"
                                                                    class="button comment">
                                                                    <span
                                                                        class="icon fa-comment"></span>{{ $post->commentNum }}</a>
                                                            </li>
                                                        </form>
                                                    @else
                                                        <li><a href="/login/" class="button like"><span
                                                                    class="icon fa-plus-circle"></span>
                                                                {{ $post->upvotes }}</a></li>
                                                        <li><a href="/login/" class="button dislike"><span
                                                                    class="icon fa-minus-circle"></span>
                                                                {{ $post->downvotes }}</a></li>
                                                        <li><a href="/posts/{{ $post->idPost }}#comment"
                                                                class="button comment"><span
                                                                    class="icon fa-comment"></span>{{ $post->commentNum }}</a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                            <div class="col-4">
                                                <p class="author">Postavio: <a
                                                        href="/user/{{ $post->authorName }}">{{ $post->authorName }}</a>
                                                    <br>
                                                    {{ $post->timePosted }}
                                                </p>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            @endforeach







                        </div>
                    </div>
                </section>




            </div>

            <!-- Korisnicke akcije -->
            <div class="col-3 col-12-medium">
                <section id="two" class="wrapper">
                    <div class="inner">
                        <div class="box">
                            @if (Route::has('login'))
                                <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                                    <ul class="actions stacked">
                                        @auth
                                            @if (Auth::user()->isAdmin())
                                                Admin:
                                            @elseif (Auth::user()->isMod())
                                                Mod:
                                            @else
                                                Korisnik:
                                            @endif

                                            {{ Auth::user()->username }}


                                            <li><a href="{{ url('/writepost') }}"
                                                    class="button primary medium fit js-forbid-guest">Napiši
                                                    definiciju</a></li>
                                            <li class="user">
                                                <form method="POST" class="invis" action="{{ route('logout') }}">
                                                    @csrf
                                                    <input type="submit" value="Odjavi me" />
                                                </form>
                                            @else
                                            <li class="guest"><a href="{{ route('login') }}"
                                                    class="button medium fit">Prijava</a></li>

                                            @if (Route::has('register'))
                                                <li class="guest">
                                                    <a href="{{ route('register') }}" class="button medium fit">
                                                        Registracija</a>
                                                </li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Paginacija -->
        <div class="row">
            <div class="col-9">
                <ul class="pagination">
                    <li><span class="button disabled">Prethodna</span></li>
                    <li><a href="#" class="page active">1</a></li>
                    <li><a href="#" class="page">2</a></li>
                    <li><a href="#" class="page">3</a></li>
                    <li><span>…</span></li>
                    <li><a href="#" class="page">8</a></li>
                    <li><a href="#" class="page">9</a></li>
                    <li><a href="#" class="page">10</a></li>
                    <li><a href="#" class="button">Sledeća</a></li>
                </ul>
            </div>
        </div>


    </div>

    <!-- Footer -->
    <div id="footer" class="wrapper">
        <div class="inner">
            <header>
                <h2>Kontaktirajte nas</h2>
                <p>Kad ste već do ovde stigli, zapratite nas i na društvenim mrežama!</p> <br>
            </header>

            <section class="contact-info">
                <div class="item">
                    <span class="icon alt fa-home"></span>
                    <p>
                        Preko puta, kod "Tri kaputa", pored auto puta,
                        kod Skendera na voće pa levo, broj 37
                    </p>
                </div>
                <div class="item">
                    <span class="icon alt fa-phone"></span>
                    <p>
                        +381 XX / XXXX - XXX
                    </p>
                </div>
                <div class="item">
                    <span class="icon alt fa-envelope"></span>
                    <a href="mailto:information@untitled.ext">tobago@tobago.co.yu</a>
                </div>
                <div class="item">
                    <span class="icon alt fa-instagram"></span>
                    <a href="#">instagram.com/tobago</a>
                </div>
                <div class="item">
                    <span class="icon alt fa-facebook"></span>
                    <a href="#">facebook.com/tobago</a>
                </div>
                <div class="item">
                    <span class="icon alt fa-linkedin"></span>
                    <a href="#">linkedin.com/teamTobago</a>
                </div>
            </section>
            <p class="copyright">
                &copy; <span class="rainbow">TOBAGO</span>. Sva prava zadržana.
            </p>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                </div>
            </div>
        </div>
    </div>
@endsection
