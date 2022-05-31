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


                        <form method="get" action="#">
                            <div class="row gtr-uniform">

                                <!-- Break -->
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-1" name="demo-radio" checked>
                                    <label for="radio-1">Najnovije</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-2" name="demo-radio" checked>
                                    <label for="radio-2">Najbolje</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-3" name="demo-radio">
                                    <label for="radio-3">Kontroverzno</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-4" name="demo-radio">
                                    <label for="radio-4">Najgore</label>
                                </div>
                                <!-- Break -->
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-ds" name="demo-radio1" checked>
                                    <label for="radio-ds">Dvorana slavnih</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-ci" name="demo-radio1">
                                    <label for="radio-ci">Čistilište</label>
                                </div>
                                <div class="col-3 col-12-small">
                                    <input type="radio" id="radio-sv" name="demo-radio1">
                                    <label for="radio-sv">Sve</label>
                                </div>
                                <!-- Break -->
                                <div class="col-6 col-12-xsmall">
                                    <input type="text" name="demo-name" id="demo-name" value=""
                                        placeholder="Ključne reči" />
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
                                <div class="spotlight post">
                                    <div class="content">
                                        <h2> <a href="/posts/{{ $post->idPost }}">{{ $post->heading }}</a></h2>
                                        <p> {{ $post->content }}
                                        </p>
                                        <div class='row'>
                                            <div class="col-8">
                                                <ul class="actions">
                                                    <li><a href="#" class="button like"><span
                                                                class="icon fa-plus-circle"></span>{{ $post->upvotes }}</a>
                                                    </li>
                                                    <li><a href="#" class="button dislike"><span
                                                                class="icon fa-minus-circle"></span>{{ $post->downvotes }}</a>
                                                    </li>
                                                    <li><a href="/posts/{{ $post->idPost }}#comment"
                                                            class="button comment"><span class="icon fa-comment"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-4">
                                                <p class="author">Postavio: <a
                                                        href="/user/{{ $post->authorName }}">{{ $post->authorName }}</a>
                                                    <br>
                                                    {{ $post->timePosted }}
                                                </p>
                                            </div>

                                            <!-- Vote forma-->
                                            @auth
                                                <div class="row">
                                                    <form method="POST" action="{{ route('vote') }}">
                                                        @csrf
                                                        <input type="hidden" id="idPost" name="idPost"
                                                            value="{{ $post->idPost }}" />

                                                        @if (isset($post->userVote) && $post->userVote == 1)
                                                            <button class="voted" type="submit" name="value" value="0"
                                                                class="btn btn-primary">
                                                                +
                                                            </button>
                                                        @else
                                                            <button type="submit" name="value" value="1"
                                                                class="btn btn-primary">
                                                                +
                                                            </button>
                                                        @endif


                                                        @if (isset($post->userVote) && $post->userVote == -1)
                                                            <button type="submit" class="voted" name="value" value="0"
                                                                class="btn btn-primary">
                                                                -
                                                            </button>
                                                        @else
                                                            <button type="submit" name="value" value="-1"
                                                                class="btn btn-primary">
                                                                -
                                                            </button>
                                                        @endif

                                                    </form>
                                                    <hr>
                                                </div>
                                            @endauth
                                        </div>

                                    </div>
                                </div>
                            @endforeach







                        </div>
                    </div>
                </section>




            </div>
            <div class="col-3 col-12-medium">
                <!-- Three -->
                <section id="two" class="wrapper">
                    <div class="inner">
                        <div class="box">

                            <ul class="actions stacked">
                                <li><a href="pisanje-post.html" class="button primary medium fit js-forbid-guest">Napiši
                                        definiciju</a></li>
                                <li class="guest"><a href="registracija.html"
                                        class="button medium fit">Registracija</a></li>
                                <li class="guest"><a href="prijava.html" class="button medium fit">Prijava</a></li>
                                <li class="user"><a href="#" id="odjavi" class="button medium fit">Odjavi me</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
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
