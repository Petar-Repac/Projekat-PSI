<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Post page')

@section('scripts')
    <script>
        window.__post = {
            id: {!! json_encode($post->idPost) !!},
            isLocked: {!! json_encode($post->isLocked) !!},
        };
    </script>
    <script src="{{ asset('js/post.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <section>
                        <h1>{{ $post->heading }}</h1>
                        <p>{{ $post->content }}</p>
                    </section>
                    <p> Author: <a href="/user/{{ $author->username }}"> {{ $author->username }}</a> </p>

                    @auth
                        @if (Auth::user()->isMod())
                            <button class="button js-lock">Zaključaj</button>
                        @endif
                    @endauth
                </div>
                <!-- Comment section -->
                <div class="card">
                    @foreach ($comments as $comment)
                        <section>
                            <h1>{{ $comment->username }}</h1>
                            <p>{{ $comment->content }}</p>
                            <span>{{ $comment->timeCreated }} </span>
                        </section>
                    @endforeach
                </div>
                <!-- Comment forma-->
                @auth
                    <div class="row">
                        <form method="POST" action="{{ route('comment') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                                <div class="col-md-6">
                                    <textarea id="content" cols="50" rows="4" placeholder='comment'
                                        class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                        name="content"> </textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" id="postId" name="postId" value="{{ $post->idPost }}" />


                                    <button type="submit" class="btn btn-primary">
                                        Comment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
