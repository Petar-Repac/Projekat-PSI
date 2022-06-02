<!-- Autor: Vukašin Stepanović 2019/0133 -->

@extends('layouts.app')

@section('title', 'Registracija')

@section('content')
    <div id="main" class="wrapper">
        <div class="inner" style="max-width: 30em">
            <h3>Registracija</h3>
            <form id="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row gtr-uniform">
                    <div class="col-12">
                        <input id="username" type="text"
                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                            required autocomplete="username" placeholder="Korisničko ime">

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-12">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required autocomplete="new-password" placeholder="Lozinka">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Ponovo lozinka">
                    </div>

                    <div class="col-12">
                        <ul class="actions">
                            <li>
                                <button type="submit" class="primary">Registruj se</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
