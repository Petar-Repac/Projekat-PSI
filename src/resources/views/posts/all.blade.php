<!-- Autor: Petar Repac 2019/0616, Vukašin Stepanović 2019/0133-->

@extends('layouts.app')

@section('title', 'Postovi')

@section('scripts')
    <script>
        @auth
        window.__user = {
            id: {!! json_encode(Auth::user()->idUser) !!}
        };
        @else
            window.__user = null;
        @endauth

        window.__posts = {!! json_encode($posts) !!};
    </script>
    <script src="{{ asset('js/all.js') }}"></script>
@endsection

@section('content')




    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Search -->
        <section id="search" class="wrapper style2">
            <div class="inner">
                <div class="spotlights">
                    <div class="spotlight">
                        <h1>Pretraga</h1>


                        <form method="GET" action="{{ route('search') }}">
                            <div class="row gtr-uniform">

                                <!-- Break -->
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-1" name="type" value="new"
                                        @if (isset($searchParams) && $searchParams['type'] == 'new') checked @endif>
                                    <label for="radio-1">Najnovije</label>
                                </div>
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-2" name="type" value="best"
                                        @if (isset($searchParams) && $searchParams['type'] == 'best') checked @endif>
                                    <label for="radio-2">Najbolje</label>
                                </div>
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-4" name="type" value="worst"
                                        @if (isset($searchParams) && $searchParams['type'] == 'worst') checked @endif>
                                    <label for="radio-4">Najgore</label>
                                </div>
                                <!-- Break -->
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-ds" name="state" value="hall"
                                        @if (isset($searchParams) && $searchParams['state'] == 'hall') checked @endif>
                                    <label for="radio-ds">Dvorana slavnih</label>
                                </div>
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-ci" name="state" value="purgatory"
                                        @if (isset($searchParams) && $searchParams['state'] == 'purgatory') checked @endif>
                                    <label for="radio-ci">Čistilište</label>
                                </div>
                                <div class="col-4 col-12-small">
                                    <input type="radio" id="radio-sv" name="state" value="all"
                                        @if (isset($searchParams) && $searchParams['state'] == 'all') checked @endif>
                                    <label for="radio-sv">Sve</label>
                                </div>
                                <!-- Break -->
                                <div class="col-6 col-12-xsmall">
                                    <input type="text" name="keywords" id="demo-name"
                                        value="@if (isset($searchParams['keywords'])) {{ $searchParams['keywords'] }} @endif"
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
            <div class="col-8 off-2 col-12-medium">
                <!-- One -->
                <section id="one" class="wrapper">
                    <div class="inner">
                        <div class="spotlights">

                            @foreach ($posts as $post)
                                <!-- Definicija -->
                                <div class="spotlight post" data-id="{{ $post->idPost }}">
                                    <div class="content">
                                        <h2> <a href="/posts/{{ $post->idPost }}">{{ $post->heading }}</a></h2>
                                        <p> {{ $post->content }} </p>
                                        <div class='row'>
                                            <div class="col-8">
                                                <ul class="actions">
                                                    <li>
                                                        <button class="button like">
                                                            <span class="icon fa-plus-circle"></span>
                                                            <span class="js-like-count">0</span>
                                                        </button>
                                                    </li>


                                                    <li>
                                                        <button class="button dislike">
                                                            <span class="icon fa-minus-circle"></span>
                                                            <span class="js-dislike-count">0</span>
                                                        </button>
                                                    </li>

                                                    @if (isset($post->userCommented) && $post->userCommented)
                                                        <li><a href="/posts/{{ $post->idPost }}#comment"
                                                                class="button comment commented">
                                                                <span
                                                                    class="icon fa-comment"></span>{{ $post->commentNum }}</a>
                                                        </li>
                                                    @else
                                                        <li><a href="/posts/{{ $post->idPost }}#comment"
                                                                class="button comment">
                                                                <span
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
