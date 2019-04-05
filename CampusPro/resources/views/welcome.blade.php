@extends('layouts.app')

@section('title', 'Home')

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
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg"
                alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a class="btn btn-primary">Button</a>
                </div>
            </div>
            </div>

        </div>
        <!--/.Third slide-->

        </div>
        <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->

 
        
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





