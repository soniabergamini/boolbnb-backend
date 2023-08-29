@extends('layouts.app')

{{-- @section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')

<div class="containerBg">
    <div class="castomCont d-flex justify-content-center align-items-center">

        <div class="container login-box containerCastom">
            <div class="row">
                <div class="col">

                    <h2>Reset Password</h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="user-box">

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <input id="email" type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                            <label for="email" class="email my-9">{{ __('E-Mail Address') }}</label>

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