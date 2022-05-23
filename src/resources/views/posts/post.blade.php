<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Post page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <section> 
                       <h1>{{ $data['post']->heading}}</h1>
                        <p>{{ $data['post']->content }}</p>
                    </section>
                    <p> Author: <a href="/user/{{$data['author']->username}}"> {{$data['author']->username}}</a>
            </div>
            <!-- Comment section -->
                <div class="card">
                 @foreach ($data['comments'] as $comment)
                    <section> 
                        <h1>{{ $comment->username}}</h1>  
                        <p>{{ $comment->content }}</p>
                        <span>{{ $comment->timeCreated }} </span>
                    </section>
                    
                @endforeach
                </div>  
            <!-- Comment forma-->
             @if (Route::has('login'))
                <div class="row">
                    <form method="POST" action="{{ route('comment') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" cols="50" rows="4" placeholder='comment' class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" > </textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <input type="hidden" id="postId" name="postId" value="{{$data['post']->idPost}}"/>


                                <button type="submit" class="btn btn-primary">
                                   Comment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection