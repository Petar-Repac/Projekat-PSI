<!-- Autor: Vukašin Stepanović -->

@extends('layouts.app')

@section('title', $user->username . ' | Profile')

@section('content')

<h1>Username: {{ $user->username }}</h1>

@if ($user->status)
  <p>Status: {{ $user->status }}</p>
@else
  <p>No status.</p>
@endif

@endsection
