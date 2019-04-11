@extends('layouts.app')

@section('content')
<div class="container loginbody">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card logincard mx-auto">
                <div class="card-header logincard-head" style="text-align:center;">
                   <img id=logo alt="CampusPro" style="margin-bottom:10px;" class="logo" src="{{ asset('images/logo.jfif') }}"><br>
                    <p class="form-title">Student Registration</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                                <input id="name" placeholder="Full Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} logininput" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} logininput" name="email" value="{{ old('email') }}" required>

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

                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control logininput" name="password_confirmation" required>

                                <div class="form-group row">

                                    <div class="col-md-5 formtext" style="margin-top:7px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-1" style="margin-top:7px;">
                                        <a class="float-right formtext" href="{{ url('/tutor/register') }}"> Register as a tutor</a>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <button type="submit" class="btn btn-primary mx-auto login-button">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <p class="formtext" style="text-align:center;margin-top:10px;"> Already have an account? <a class="formtext"  href="{{route('login')}}"> Login Here</a></p>                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection