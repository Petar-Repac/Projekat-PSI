<!-- Autor: Petar Repac -->

@extends('layouts.app')

@section('title', 'Write a post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write a post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('write') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="heading" class="col-md-4 col-form-label text-md-right">Heading</label>

                            <div class="col-md-6">
                                <input id="heading" type="text" class="form-control{{ $errors->has('heading') ? ' is-invalid' : '' }}" name="heading" placeholder="Naslov" autocomplete="heading">

                                @if ($errors->has('heading'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('heading') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" cols="50" rows="4"  class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" > </textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Write
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
