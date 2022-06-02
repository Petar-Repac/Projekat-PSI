<!-- Autor: Petar Repac -->
@extends('layouts.app')

@section('title', $post->heading . ' | Post')

@section('scripts')
    <script>
        @auth
        window.__user = {
            id: {!! json_encode(Auth::user()->idUser) !!}
        };
        @else
            window.__user = null;
        @endauth
        window.__post = {
            id: {!! json_encode($post->idPost) !!},
            isLocked: {!! json_encode($post->isLocked) !!},
            upvotes: {!! json_encode($post->upvotes) !!},
            downvotes: {!! json_encode($post->downvotes) !!},
            userVote: {!! json_encode($post->userVote) !!},
        };
    </script>
    <script src="{{ asset('js/post.js') }}"></script>
@endsection

@section('content')


    <!-- Main -->
    <div id="main" class="wrapper style1 post">
        <div class="inner">
            <header>
                <ul class="actions">

                    <a href="/all" class="button medium"><span class="icon fa-angle-double-left"></a>
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

                    @auth
                        @if (Auth::user()->isMod())
                            <li class="mod">

                                <button id="toggle-lock-text" class="button js-lock toggle-lock-text">
                                    <span class="icon fa-lock"></span>
                                </button>

                            </li>
                        @endif
                    @endauth

                </ul>
                <h1>{{ $post->heading }} </h1>
            </header>
            <p>{{ $post->content }}</p>






            <!--Comment section-->
            <div id="comment-section" class="box">
                <header>
                    <h1>Komentari</h1>
                </header>
                <div class="content">

                    <!-- Komentari -->
                    @foreach ($comments as $comment)
                        <div class="spotlight comment">
                            <div class="content">
                                <h2> <a href="/user/{{ $comment->username }}">{{ $comment->username }}</a></h2>
                                <p>{{ $comment->content }}</p>
                                <span>{{ $comment->timeCreated }} </span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="row">
                <form id="post-comment" method="POST" action="{{ route('comment') }}">
                    @csrf
                    <input type="hidden" id="postId" name="postId" value="{{ $post->idPost }}" />

                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <textarea id="content" cols="50" rows="4" placeholder='comment'
                                class="js-comment-text form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                name="content"> </textarea>

                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <ul class="actions">
                                <li><button id="submit-komentar" type="submit"
                                        class="button comment js-comment-submit">Postavi
                                        komentar</button></li>
                            </ul>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer" class="wrapper post-page">
        <div class="inner">

            <p class="copyright">
                &copy; <span class="rainbow">TOBAGO</span>. Sva prava zadržana.
            </p>
        </div>
    </div>




@endsection
