@extends('layouts.app')

@section('content')


<div class="containerBgRegister py-4">
    <div class="d-flex justify-content-center align-items-center">

        <div class="container login-box my-4 containerCastom">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userBoxes = document.querySelectorAll('.user-box input');

        userBoxes.forEach(userBox => {
            userBox.addEventListener('input', function() {
                if (userBox.value.trim() !== '') {
                    userBox.parentElement.classList.add('has-value');
                } else {
                    userBox.parentElement.classList.remove('has-value');
                }
            });
        });
    });
</script>
  

@endsection

{{-- @section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }} </label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
