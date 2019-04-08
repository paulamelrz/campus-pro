@extends('layouts.app')

@section('content')
<div class="container loginbody">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card logincard mx-auto">
                <div class="card-header logincard-head" style="text-align:center;">
                   <img id=logo alt="CampusPro" style="margin-bottom:10px;" class="logo" src="{{ asset('images/logo.jfif') }}"><br>
                    <p class="form-title">Tutor Login</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tutor.login.submit') }}">
                        @csrf
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} logininput" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} logininput" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        <div class="form-group row">
                        
                            <div class="col-md-6 formtext" style="margin-top:7px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4 offset-md-1" style=" padding:0;">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link formtext" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                            @endif
                            </div>
                        </div>

                        <div class="row">
                                <button type="submit" class="btn btn-primary mx-auto login-button">
                                    {{ __('Login') }}
                                </button>
                        </div>
                        <p class="formtext" style="text-align:center;margin-top:10px;"> Don't have an account? <a class="formtext"  href="{{route('tutor.login')}}"> Register Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
