<!-- Autor: Vukašin Stepanović -->

@extends('layouts.app')

@section('title', $user->username . ' | Profil')

@section('scripts')
    <script>
        window.__user = {
            username: {!! json_encode($user->username) !!},
            status: {!! json_encode($user->status) !!},
            isBanned: {!! json_encode($user->isBanned == 1) !!},
            role: {!! json_encode($user->isAdmin() ? 'admin' : ($user->isMod() ? 'mod' : 'user')) !!},
        };
    </script>
    <script src="{{ asset('js/user.js') }}"></script>
@endsection

@section('content')
    <div id="main" class="wrapper">
        <div class="inner">
            <header>
                <h1>{{ $user->username }}</h1>
            </header>

            <p class="js-status-display invisible">No status</p>

            @auth
                @if (Auth::user()->idUser == $user->idUser)
                    <button class="js-edit-status">Izmeni status</button>

                    <form class="js-status hidden">
                        @csrf

                        <div class="row gtr-uniform">
                            <div class="col-12">
                                <input type="text" name="status" required autocomplete="off" value="{{ $user->status }}" />
                            </div>
                        </div>
                        <button class="button" type="submit">Izmeni status</button>
                    </form>
                @endif

                @if (Auth::user()->isMod())
                    <ul class="js-admin-panel invisible actions" style="margin-top: 1em;">
                        @if (Auth::user()->username != $user->username)
                            @unless(Auth::user()->isMod() && $user->isAdmin())
                                <li>
                                    <button class="js-ban button">Zabrani pristup nalogu</button>
                                </li>
                            @endunless

                            @if (Auth::user()->isAdmin())
                                <li>
                                    <button class="js-promote button">Unapredi u moderatora</button>
                                </li>
                            @endif
                        @elseif (Auth::user()->isAdmin())
                            <li>
                                <button class="js-selection button">Izvrši selekciju</button>
                            </li>
                        @endif
                    </ul>
                @endif
            @endauth
        </div>
    </div>
@endsection
