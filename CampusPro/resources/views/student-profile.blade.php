@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
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
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#register-modal" >Register</a>
                                  
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
                            <form>
                                <input type="email" placeholder="Email" name="email" class="login-input" required><br>
                                <input type="password" placeholder="Enter Password" name="psw" class="login-input" required><br>
                                <button type="submit" class="form-button">Login</button><br>
                                <p>Not a member?<a href=""> Register Here!</a></p>
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
                            <form>
                                <input type="email" placeholder="Email" name="email" class="login-input" required><br>
                                <input type="password" placeholder="Enter Password" name="psw" class="login-input" required><br>
                                <button type="submit" class="form-button">Login</button><br>
                                <p>Not a member?<a href=""> Register Here!</a></p>
                            </form>
                        </div>
                      </div>
                </div>
            </div>

            
			
            <!-- Pop-up form for registration-->
            <div class="modal fade" id="register-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
						<h4 class="modal-title">Register</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form">
                            <form>
                                <div class="form-line">
                                <input type="text" placeholder="First Name" name="fname" class="login-input" required><br>

                                <input type="text" placeholder="Last Name" name="lname" class="login-input" required><br>
                                </div>
                                
                                <div class="form-line">
                                    <input type="email" placeholder="Email" name="email" class="login-input" required>
                                    
                                  <select>
                                    <option>Register as a</option>
                                    <option>Tutor</option>
                                    <option>Student</option>
                                  </select>
                                </div>
                                
                                <div class="form-line">
                                <input type="password" placeholder="Enter Password" name="psw" class="login-input" required><br>
                                <input type="password" placeholder="Re-Enter Password" name="re-psw" class="login-input" required><br>
                                </div>
                                <button type="submit" class="form-button">Register</button><br>
                                <p>Not a member?<a href=""> Register Here!</a></p>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        
        <!-- Row 1 Content-->
        <div class="container-fluid row1">
        <h1>Find help with your courses</h1>
            <p class="row1-text">Having difficulty finding assitance related to your course?<br>
            You may find tutors for that course below! Give it a try.</p>
            
            <button type="button" class="row1-button" href="Courses.html">View Courses</button> <br>
            <button type="button" class="row1-button" href="Courses.html">Register Here</button>
        </div>
        
        <!--Row 2 Content-->
        <div class="container-fluid row2">
            <div class="col-sm-4">
                <p>
                    Tutors have done the course
                </p>
            </div>
            <div class="col-sm-4">
                <p>
                    Tutors are approved by lecturers
                </p>
            </div>
            <div class="col-sm-4">
                <p>
                    Learn at your own pace
                </p>
            </div>
        </div>
        
        <!--Row 2 Content-->
        <div class="container-fluid row3">
            <h1 class="row3-head">Most Popular Courses</h1>
            <div class="col-sm-3 slides">
                <img src="images/accounts.jpg" alt="Snow" style="width:100%; height:100%;">
                <div class="slide-text">Accouting</div>
            </div>
            <div class="col-sm-3 slides">
                <img src="images/compsci.jpg" alt="Snow" style="width:100%; height:100%;">
                <div class="slide-text">Programming</div>
            </div>
            <div class="col-sm-3 slides">
                <img src="images/math.jpg" alt="Snow" style="width:100%; height:100%;">
                <div class="slide-text">Physics</div>
            </div>
            <div class="col-sm-3 slides">
                <img src="images/writing.jpg" alt="Snow" style="width:100%; height:100%;">
                <div class="slide-text">Writing</div>
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

@endsection
