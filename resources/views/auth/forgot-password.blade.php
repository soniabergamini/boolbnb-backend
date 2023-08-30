@extends('layouts.app')

@section('content')

<div class="containerBg">
    <div class="castomCont d-flex justify-content-center align-items-center">

        <div class="container login-box containerCastom">
            <div class="row">
                <div class="col">

                    <h2>{{ __('Reset Password') }}</h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="user-box">

                            <input id="email" type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                            <label for="email" class="email my-9">{{ __('E-Mail Address') }}</label>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="col d-flex">
                            <button class="castom" type="submit">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div> 
        </div>

    </div>      
</div>

@endsection