@extends('layouts.app')

@section('title', 'Home')

@section('content')
        
        <!-- Row 1 Content-->
        <div class="container-fluid row1">
        <h1 class="row1-head">Find help with your courses</h1>
            <p class="row1-text">Having difficulty finding assitance related to your course?<br>
            You may find tutors for that course below! Give it a try.</p>

           <a href="/channels" style="text-decoration:none;"> <button type="button" class="row1-button" style="margin-bottom:5px">View Courses</button></a> 
           <a href="/student" style="text-decoration:none;"> <button type="button" class="row1-button" href="/student">Register Here</button></a>
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

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2 class="row3-head">Most <b>Popular Channels</b></h2><hr width="30%" style="color:blue !important;">
            
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">

                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="{{ asset('images/math.jpg') }}" class="img-responsive img-fluid" alt="">									
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Calculus A</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="{{ asset('images/compsci.jpg') }}" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Computer Science</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>		
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="{{ asset('images/writing.jpg') }}" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Creative Writing</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>								
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="{{ asset('images/accounts.jpg') }}" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Accounting 2</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/products/iphone.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Introduction to Microeconomics</h4>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/products/canon.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Software Engineering</h4>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/products/pixel.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Computer Architecture</h4>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>	
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                        <img src="/examples/images/products/watch.jpg" class="img-responsive img-fluid" alt="">
                                    <div class="thumb-content">
                                        <h4>Real Analysis</h4>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary">View Course</a>
                                    </div>						
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
		    </div>
		</div>
	</div>
    </div>

    <div class="container-fluid">
        <div class="row">
        
        </div>
    </div>



@endsection





