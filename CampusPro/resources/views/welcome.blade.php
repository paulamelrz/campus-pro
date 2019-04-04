@extends('layouts.app')

@section('title', 'CampusPro - Home')

@section('content')        
        
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
            <h3 class="row3-head">What's Popular</h3>
            <hr width="50%">
            <div class="d-flex justify-content-around  mb-3">
                <div class="col-sm-4">
                    <div class="card h-100 popcard" style="width: 18rem;">
                        <img class="card-img-top" src="images/accounts.jpg" alt="Snow" style="width:100%; height:100%;">
                        <div class="card-body">
                            <h5 class="card-title">Accounts</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card h-100 popcard" style="width: 18rem;">
                        <img class="card-img-top" src="images/compsci.jpg" alt="Snow" style="width:100%; height:100%;">
                        <div class="card-body">
                            <h5 class="card-title">Computer Science</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card h-100 popcard" style="width: 18rem;"> 
                        <img class="card-img-top" src="images/math.jpg" alt="Snow" style="width:100%; height:100%;">
                        <div class="card-body">
                            <h5 class="card-title">Mathematics</h5>
                        </div>
                    </div>
                </div>
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

@endsection





