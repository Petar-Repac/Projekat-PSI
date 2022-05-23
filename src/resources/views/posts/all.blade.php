<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($posts as $post)
                        <section>
                            <a href="/posts/{{ $post->idPost }}">
                                <h1>{{ $post->heading }}</h1>
                            </a>
                            <p>{{ $post->content }}</p>
                            <hr>
                            <p>Date:{{ $post->timePosted }}</p>
                            <hr>
                            <p>Upvotes:{{ $post->upvotes }}</p>
                            <hr>
                            <p>Downvotes:{{ $post->downvotes }}</p>
                            <hr>
                            <p>User vote:{{ $post->userVote }}</p>
                            <!-- Comment forma-->
                            @auth
                                <div class="row">
                                    <form method="POST" action="{{ route('vote') }}">
                                        @csrf
                                        <input type="hidden" id="idPost" name="idPost" value="{{ $post->idPost }}" />  
                                        
                                        @if(isset($post->userVote) && $post->userVote == 1)
                                            <button type="submit" name="value" value="0" class="btn btn-primary">
                                                +
                                            </button>
                                        @else 
                                            <button type="submit" name="value" value="1" class="btn btn-primary">
                                                +
                                            </button>
                                        @endif
                                        

                                        @if(isset($post->userVote) && $post->userVote == -1)
                                            <button type="submit" name="value" value="0" class="btn btn-primary">
                                                -
                                            </button>
                                        @else
                                            <button type="submit" name="value" value="-1" class="btn btn-primary">
                                                -
                                            </button>
                                        @endif
                                        
                                    </form> 
                                     
                                </div>
                            @endauth
                        </section>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
