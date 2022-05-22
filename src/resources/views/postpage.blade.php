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
        </div>
    </div>
</div>
@endsection