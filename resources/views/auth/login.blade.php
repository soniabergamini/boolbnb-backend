@extends('layouts.app')

@section('content')

<div class="containerBg">
    <div class="castomCont d-flex justify-content-center align-items-center">

        <div class="container login-box containerCastom">
            <div class="row">
                <div class="col">

                    <h2>{{ __('Login') }}</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="user-box py-3">

                            <input id="email" type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                            <label class="email my-9">Email</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="user-box py-3">

                            <input id="password" type="password" name="password" required class="@error('password') is-invalid @enderror" autocomplete="current-password">
                            <label class="my-9" for="password">Password</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-light" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="col d-flex">
                            <button class="castom" type="submit">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="mx-3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>

                    </form>
                </div>
            </div> 
        </div>


    </div>  
</div>

@endsection

