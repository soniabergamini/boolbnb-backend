@extends('layouts.app')

{{-- @section('content') --}}
{{-- <div id="containerBg">
    <div class="container containerCastom">
        <div class="row justify-content-center containerCastom">
            <div class="col-md-8 align-self-center">
                <div class="card formBg border border-black mb-3">
                    <div class="card-header">{{ __('Login') }}</div> 
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- @endsection --}}

@section('content')

<div class="containerBg">
    <div class="castomCont d-flex justify-content-center align-items-center">

        <div class="container login-box containerCastom">
            <div class="row">
                <div class="col">

                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="user-box">

                            <input id="email" type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                            <label class="email my-9">Email</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="user-box">

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
                            <a class="" href="{{ route('password.request') }}">
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

