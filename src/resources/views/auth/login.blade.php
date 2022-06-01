<!-- Autor: Vukašin Stepanović -->

@extends('layouts.app')

@section('title', 'Prijava')

@section('content')
    <div id="main" class="wrapper">
        <div class="inner" style="max-width: 30em">
            <h3>Prijava</h3>
            <form id="form" method="POST" action="{{ route('login') }}">
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
                            required autocomplete="current-password" placeholder="Lozinka">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-12">
                        <ul class="actions">
                            <li>
                                <button type="submit" class="primary">Prijavi se</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const params = new URLSearchParams(location.search);
        if (params.get("banned")) {
            showDialog({
                content: "Vašem nalogu je zabranjen pristup.",
                type: "error"
            });
        }
    </script>
@endsection
