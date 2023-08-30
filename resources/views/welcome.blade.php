@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            {{-- <img src="" alt=""> --}}
        </div>
        <h1 class="display-5 fw-bold">
            Welcome to BoolBnb
        </h1>

        <p class="col-md-8 fs-4">"Extraordinary homes, unique travels."</p>
        <a href="http://127.0.0.1:8000/login" class="btn btn-primary btn-lg" type="button">Login</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>“Travel enhances the mind in a marvelous way and eradicates our prejudices”. Oscar Wilde</p>
    </div>
</div>
@endsection