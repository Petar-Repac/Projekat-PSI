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
                        <h1>{{ $post->heading}}</h1>
                        <p>{{ $post->content }}</p>
                    </section>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection