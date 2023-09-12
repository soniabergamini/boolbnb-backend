@extends('layouts.app')

@section('content')


<div class="containerBg">
    <div class="d-flex justify-content-center pt-5">

        <div class="container login-box containerCastom">
            <div class="row">
                <div class="col">

                    <h2>{{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="user-box">
                            <input id="name" type="text" name="name" class=" @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>
                            <label for="name" class="my-9">{{ __('Name') }} </label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="user-box ">
                            <input id="surname" type="text" name="surname"   class="  @error('surname') is-invalid @enderror" value="{{ old('surname') }}"  autocomplete="surname"  autofocus>
                            <label for="surname" class="my-9">{{ __('Surname') }} </label>
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="user-box ">
                            <input id="date_of_birth" type="date" name="date_of_birth"  class="  @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth"  autofocus>
                            <label for="date_of_birth" class=" my-9">{{ __('Date of birth') }} </label>
                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="user-box">
                            <input for="email" id="email" type="email" name="email"  minlength="8" maxlength="100" required class="  @error('email') is-invalid @enderror" value="{{ old('email') }}"  autocomplete="email"  autofocus>
                            <label class="email my-9"> {{ __('E-Mail Address') }} <span class="text-danger">*</span> </label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="user-box">
                            <input id="password" type="password" name="password"  minlength="8" maxlength="100" required class=" @error('password') is-invalid @enderror"  autocomplete="new-password">
                            <label class="my-9" for="password">{{ __('Password') }} <span class="text-danger">*</span> </label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="user-box">
                            <input id="password-confirm" type="password" name="password_confirmation" minlength="8" maxlength="100" required class="  @error('password-confirm') is-invalid @enderror"  autocomplete="new-password">
                            <label class="my-9" for="password">{{ __('Confirm Password') }} <span class="text-danger">*</span> </label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col d-flex">
                            <button class="castom" type="submit">
                                {{ __('Register') }}
                            </button>

                        </div>

                    </form>
                </div>
            </div> 
        </div>


    </div>

        
</div>

@endsection
