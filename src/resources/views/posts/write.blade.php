<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Napiši post')

@section('content')

    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="inner">
            <header class="major post-form">
                <h1>Napiši definiciju</h1>
                <p>
                    Ne zaboravi, dozvoljeno je postavljanje samo jedne definicije dnevno!
                </p>
            </header>

        </div>
        <!-- forma -->
        <section id="post-form" class="contact-form">

            <form method="POST" action="{{ route('write') }}">
                @csrf
                <div class="fields">
                    <div class="field half">
                        <label for="heading" class="col-md-4 col-form-label text-md-right">Naslov</label>
                        <input id="heading" type="text"
                            class="form-control{{ $errors->has('heading') ? ' is-invalid' : '' }}" name="heading"
                            placeholder="Naslov" maxlength="100">
                        @if ($errors->has('heading'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('heading') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">

                        <label for="heading" class="col-md-4 col-form-label text-md-right">Sadržaj</label>
                        <textarea id="content" cols="50" rows="4" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                            name="content" maxlength="1000"> </textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <ul class="actions special">
                            <li><button type="submit" class="button primary">Postavi</button></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
        <!-- Footer -->
        <div id="footer" class="wrapper post-page">
            <div class="inner">

                <p class="copyright">
                    &copy; <span class="rainbow">TOBAGO</span>. Sva prava zadržana.
                </p>
            </div>
        </div>

    @endsection
