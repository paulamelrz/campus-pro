@extends('layouts.app')

@section('content')
<script> //shows content when tab link is pressed
    $(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
     });
    });
</script>

<div class="container">
    <header class="bg-secondary align-items-center">
        <img style="height:auto; width:100%;"src="images/banner.png">
    </header>
    <div class="jumbotron">
        <div class="row">
            <div class="col-2">
                <img src="images/profile.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:90px; float:left;">
            </div>
            <div class="col-8">
                <h2 class="float:right; ">{{$channel_rec->channel_name}}</h2>
                <p># enrollments</p><br>
                <div class="row">
                    <div class="col-sm">
                        <p>tutor name</p>
                    </div>
                    <div class="col-sm">
                        <p>Avg Review star star star..</p>                
                    </div>
                </div>                
            </div>
            <div class="col-2">
                <!-- Only show for students <button class="btn btn-danger">Enroll</button> -->
            </div>
        </div> 
        <!-- Tabs Nav -->
    <ul class="nav nav-tabs" style="margin-bottom:-63px; margin-top:50px;">
          <li class="nav-item active">
                <a class="nav-link scroll" href="#content">Content</a>
          </li>
          <li class="nav-item">
                <a class="nav-link scroll" href="#tutorials">Tutorials Feed</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" href="#resource">Resource Hub</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" href="#discussions">Discussions</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" href="#info">info</a>
          </li>
    </ul>   
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="tab-content"><br>      
                <!-- Content Tab -->
                <div id="content" class="tab-pane fade in active">
                    <h4>Content</h4><br>
                </div>

                <!-- Tutorials Feed Tab -->
                <div id="tutorials" class="tab-pane fade in active">
                    <h4>Tutorials Feed</h4><br>
                </div>

                <!-- Resource Hub Tab -->
                <div id="resource" class="tab-pane fade in active">
                    <h4>Resource Hub</h4><br>
                </div>

                <!-- Dicussions Tab -->
                <div id="discussions" class="tab-pane fade in active">
                    <h4>Discussions</h4><br>
                </div>

                <!-- Info Tab -->
                <div id="info" class="tab-pane fade in active">
                    <h4>Channel Info</h4><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection