<!-- Autor: Vukašin Stepanović -->

@extends('layouts.app')

@section('title', $user->username . ' | Profile')

@section('scripts')
  <script>
    window.__user = {
        username: {!! json_encode($user->username) !!},
        status: {!! json_encode($user->status) !!},
    };
  </script>
  <script src="{{ asset('js/user.js') }}"></script>
@endsection

@section('content')
  <h1>Username: {{ $user->username }}</h1>

  <p class="status-display invisible">No status</p>

  @auth
    @if (Auth::user()->idUser == $user->idUser)
      <button class="js-edit-status">Edit status</button>
    @endif

    <form class="status hidden">
      @csrf
      <textarea name="status">{{ $user->status }}</textarea>
      <input type="submit" value="Izmeni status">
    </form>
  @endauth


@endsection
