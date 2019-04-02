<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Quwius</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
           
			  <!-- Latest compiled and minified CSS -->
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			  <link rel="stylesheet" href="css/style.css">
			  <!--Font Awesome Icons-->
			  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
			  <!-- jQuery library -->
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			  <!-- Popper JS -->
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			  <!-- Latest compiled JavaScript -->
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
         
    </head>
    <body> 
    <!--Navigation Bar-->          
         <nav class="navbar navbar-expand-md navbar-light fixed-top">     
            <a class="navbar-brand" href="#">
                <img id=logo alt="Logo" class="logo" src="images/logo.png">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapseNav">
                   <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse" id="collapseNav">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link scroll" href="index.php?controller=Index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll"href="index.php?controller=Courses">Channels</a>
                    </li>
                     <li class="nav-item">
                       <a class="nav-link scroll" href="index.php?controller=Tutors">Tutors</a>
                     </li>
                 </ul>
                 <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Login
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#login-modal1">As Student</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#login-modal2">As Tutor</a>
                          </div>
                    </li> 
                    <li class="nav-item">
                         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Register</a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#register-modal1">As Student</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#register-modal2">As Tutor</a>
                          </div>
                    </li>             
                  </ul>
             </div>
         </nav>

            <!-- Pop-up forms-->
			
			<!--Popup Login for Student-->
            <div class="modal fade" id="login-modal1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
						  <h4 class="modal-title">Login as Student</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">      
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
			
			<!--Popup Login for Tutor-->
			<div class="modal fade" id="login-modal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
						  <h4 class="modal-title">Login as Tutor</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">      
                        <form method="POST" action="{{ route('tutor.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="tutor-email" type="email" class="form-control{{ $errors->has('tutor-email') ? ' is-invalid' : '' }}" name="tutor-email" value="{{ old('tutor-email') }}" required autofocus>

                                @if ($errors->has('tutor-email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tutor-email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="tutor-password" type="password" class="form-control{{ $errors->has('tutor-password') ? ' is-invalid' : '' }}" name="tutor-password" required>

                                @if ($errors->has('tutor-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tutor-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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

            
			
            <!-- Pop-up form for student registration-->
            <div class="modal fade" id="register-modal1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
						<h4 class="modal-title">Register as a Student</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form">
                            <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="stu-reg-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="stu-reg-name" type="text" class="form-control{{ $errors->has('stu-reg-name') ? ' is-invalid' : '' }}" name="stu-reg-name" value="{{ old('stu-reg-name') }}" required autofocus>

                                @if ($errors->has('stu-reg-name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stu-reg-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stu-reg-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="stu-reg-email" type="email" class="form-control{{ $errors->has('stu-reg-email') ? ' is-invalid' : '' }}" name="stu-reg-email" value="{{ old('stu-reg-email') }}" required>

                                @if ($errors->has('stu-reg-email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stu-reg-email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stu-reg-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="stu-reg-password" type="password" class="form-control{{ $errors->has('stu-reg-password') ? ' is-invalid' : '' }}" name="stu-reg-password" required>

                                @if ($errors->has('stu-reg-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stu-reg-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
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
        
         <!-- Pop-up form for tutor registration-->
            <div class="modal fade" id="register-modal2" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
						<h4 class="modal-title">Register as a Tutor</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                            <form method="POST" action="{{ route('tutor.register.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="tut-reg-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="tut-reg-name" type="text" class="form-control{{ $errors->has('tut-reg-name') ? ' is-invalid' : '' }}" name="tut-reg-name" value="{{ old('tut-reg-name') }}" required autofocus>

                                @if ($errors->has('tut-reg-name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tut-reg-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tut-reg-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="tut-reg-email" type="email" class="form-control{{ $errors->has('tut-reg-email') ? ' is-invalid' : '' }}" name="tut-reg-email" value="{{ old('tut-reg-email') }}" required>

                                @if ($errors->has('tut-reg-email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tut-reg-email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tut-reg-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="tut-reg-password" type="password" class="form-control{{ $errors->has('tut-reg-password') ? ' is-invalid' : '' }}" name="tut-reg-password" required>

                                @if ($errors->has('tut-reg-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tut-reg-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
        
        
        <!-- Row 1 Content-->
        <div class="container-fluid row1">
        <h1 class="row1-head">Find help with your courses</h1>
            <p class="row1-text">Having difficulty finding assitance related to your course?<br>
            You may find tutors for that course below! Give it a try.</p>
            
            <button type="button" class="row1-button" href="Courses.html">View Courses</button> <br>
            <button type="button" class="row1-button" href="Courses.html">Register Here</button>
        </div>

        
        
        <!--Row 2 Content-->
        <div class="container-fluid row2">
         <div class="row">   
            <div class="col-sm-4 row2col">
                <p>
                    <i style='font-size:36px' class='fas row2-fas'>&#xf4fc;</i>Tutors are Verified
                </p>
            </div>
            <div class="col-sm-4 row2col">
                <p>
                    <i style='font-size:36px' class='fas row2-fas'>&#xf500;</i>Learn from your peers
                </p>
            </div>
            <div class="col-sm-4 row2col">
                <p>
                    <i style='font-size:36px' class='fas row2-fas'>&#xf19d;</i>Learn at your own pace
                </p>
            </div>
        </div>
        </div>
        
        <!--Row 3 Content-->
        <div class="container-fluid row3">
            <h3 class="row3-head">What's Popular</h1>
            <hr width="50%">
            <div class="d-flex justify-content-around  mb-3">
                <div class="p-3 slides ">
                    <img src="images/accounts.jpg" alt="Snow" style="width:100%; height:100%;">
                    <div class="slide-text">Accouting</div>
                </div>
                <div class="p-2  slides offset-sm-1">
                    <img src="images/compsci.jpg" alt="Snow" style="width:100%; height:100%;">
                    <div class="slide-text">Programming</div>
                </div>
                <div class="p-2  slides offset-sm-1">
                    <img src="images/math.jpg" alt="Snow" style="width:100%; height:100%;">
                    <div class="slide-text">Physics</div>
                </div>
            </div>

 
        
        <!-- Footer containing site map and social media links-->
        <div class="footer">
            <ul>
                <li><a href="#" class="footer-text">Home</a></li>
                <li><a href="#" class="footer-text">Courses</a></li>
                <li><a href="#" class="footer-text">Login</a></li>
                <li><a href="#" class="footer-text">Register</a></li>
            </ul>
            <hr>
        </div>
    </body> 
</html>





