@extends('layouts.app')

@section('content')
<script> //shows content when tab link is pressed
    $(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
     });
    });
</script>
<!-- <script>
    $(document).ready(function(){
   
    $(".topic a").click(function(){
        var newId = $(this).attr("href");
        //$('.topic-content' newId).show();
        //$('.topic-content').show(newId);
        // var target = $(.topic-content).nextAll(newId);
        // $(".topic-content").not(target).hide();
        // target.toggle();
        
        $(newId).toggle();
     });
    });
</script> -->

<br>
<div class="container">
@if(session('topic-success')!= NULL)
    <div class="alert alert-success" role="alert">
        {{ session()->get('topic-success') }}
    </div>
@endif
    <header class="bg-secondary align-items-center">
        <img style="height:auto; width:100%;" src="images/banner.png">
    </header>
    <div class="jumbotron">
        <div class="row">
            <div class="col-2">
                <img src="images/profile.png" alt="Channel thumbnail" class="mr-3 mt-3 rounded-circle" style="width:90px; float:left;">
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
             <a class="nav-link scroll" href="#reviews">Reviews</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" href="#info">info</a>
          </li>
         
    </ul>   
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tab-content"><br>      
                <!-- Content Tab -->
                <div id="content" class="tab-pane fade in active container-fluid">
                    <!--
                        1. Tutor can create topics 
                        2. Tutor can add text, video, img, links under each topic
                        3. Student can view content and navigate by topic.
                    -->
                    <div class="row">
                        
                    <!-- Topics sidebar -->
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <div style="color:white;" class="card-header bg-dark">
                                    <h5>Topics</h5>
                                </div>
                                    @foreach($topics as $topic)
                                        <div class="card-header topics">
                                            <a class="card-link" href="#{{$topic->id}}">{{$topic->title}}</a>
                                        </div>
                                    @endforeach
                                    <div class="card-header addTopic">
                                        <a style="color:white; display:block;" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Topic</a>
                                        <form method="POST" action="{{ route('topics.store') }}" style="display:none;">
                                            @csrf
                                            <input id="channel_id" type="hidden" name="channel_id" value="{{$channel_rec->channel_id}}">
                                            <input id="topic" placeholder="Enter new topic here" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="topic" value="{{ old('topic') }}" required autofocus>

                                            @if ($errors->has('topic'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> {{ $errors->first('topic') }} </strong>
                                                </span>
                                            @endif
                                            <br>
                                            <button id="add" class="btn btn-success" type="submit"> Add</button>
                                            <button id="cancel" class="btn btn-secondary" type="button"> Cancel</button>
                                        </form>
                                    </div>
                                    
                            </div>
                        </div>

                        <!-- Topic Content -->
                        <div class="col-md-9">
                            @foreach($topics as $topic)
                                <div id="{{$topic->id}}" class="card mb-2 topic-content">
                                
                                    <div class="card-header">
                                        <h5>{{$topic->title}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$topic->textarea}}</p>
                                        <!-- <iframe width="420" height="315" src="//www.youtube.com/embed/mBCizetiYEU" frameborder="0" allowfullscreen></iframe> -->
                                    </div>

                                </div>
                            @endforeach
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Tutorials Feed Tab -->
                <div id="tutorials" class="tab-pane fade in active">
                    <h4>Tutorials Feed</h4><br>
                    <!--
                    1. Posts made by tutor ordered by most recent to least recent. 
                    2. Students can comment/like
                    3. Sorted by tags? 

                    -->
                </div>

                <!-- Resource Hub Tab -->
                <div id="resource" class="tab-pane fade in active">
                    <h4>Resource Hub</h4><br>
                    <!--
                    1. Students and tutors can make posts
                    2. Posts ordered by date(in a feed) and tags
                    3. Students and tutors can comment, flag.
                    4. Tutors can remove any posts.

                    -->
                </div>

                <!-- Dicussions Tab -->
                <div id="discussions" class="tab-pane fade in active">
                    <h4>Discussions</h4><br>
                    <!--
                        1. Forum threads (topics) -> both students and tutors can create a thread
                        2. Forum posts + comments under each
                        3. Student can like or flag
                        4. Tutor can like, flag, remove any comment

                    -->
                </div>

                <!-- Info Tab -->
                <div id="info" class="tab-pane fade in active">
                    <h4>Channel Info</h4><br>
                    <!--
                    
                    1. Display channel description. Allow tutor to edit
                    2. Display list of enrolled students

                    -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>  
//show add topic form
$(document).ready(function(){
    $(".addTopic a").click(function(){
        $(this).hide();
        $('.addTopic form').show();
    });

    //if close button is clicked
    $("#cancel").click(function(){
        $('.addTopic form').hide();
        $('.addTopic a').show();
    });
}); 
</script>
@endsection