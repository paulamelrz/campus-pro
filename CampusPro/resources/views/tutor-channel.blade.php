@extends('layouts.app')

@section('content')
<!-- <script> //shows content when tab link is pressed
    $(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
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
@if(session('textarea-success')!= NULL)
    <div class="alert alert-success" role="alert">
        {{ session()->get('textarea-success') }}
    </div>
@endif

    <header class="bg-secondary align-items-center">
        <img style="height:auto; width:100%;"src="images/banner.png">
    </header>
    <div class="jumbotron">
        <div class="row">
            <div class="col-2">

                <?php
                $mypath = \DB::table('tutor_profile_pics')->select('src')->where('tutor_id', Auth::user()->id)->first();
                ?>
                <img src="<?php echo $mypath->src; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:90px; float:left;">
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
                <a class="nav-link scroll" data-toggle="tab" href="#content">Content</a>
          </li>
          <li class="nav-item">
                <a class="nav-link scroll" data-toggle="tab" href="#tutorials">Tutorials Feed</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" data-toggle="tab" href="#resource">Resource Hub</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" data-toggle="tab" href="#discussions">Discussions</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" data-toggle="tab" href="#reviews">Reviews</a>
          </li>
          <li class="nav-item">
             <a class="nav-link scroll" data-toggle="tab" href="#info">info</a>
          </li>
    </ul>   
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="tab-content"><br>      
                <!-- Content Tab -->
                <div id="content" class="container tab-pane active">
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
                                            <a data-toggle="tab" class="card-link" href="#{{$topic->id}}">{{$topic->title}}</a>
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
                                        @if($topic->textarea != NULL)

                                            <p value="{{$topic->textarea}}">{{$topic->textarea}}</p>

                                            <p>{{$topic->textarea}}</p>

                                            <button method="put" action="{{route('topics.update', $topic->id)}}" class="btn btn-secondary">
                                                <i class="fas fa-edit"></i> Edit text
                                            </button> 
                                        @else

                                        <div class="addText">
                                            <a style="color:white; display:block; width:50%;" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Text</a>
                                            <form style="display:none;" type="text" method="put" action="">
                                                <textarea placeholder="Enter your text here" style="width:100%; height:50%;" name="topic-text" required></textarea><br>
                                                <button id="save" type="submit" class="btn btn-success"> Save</button>
                                                <button id="cancelText" type="button" class="btn btn-secondary"> Cancel</button>

                                            <form type="text" method="put" action="{{route('topics.update', $topic->id)}}">
                                                <textarea></textarea>

                                            </form>
                                        </div>    
                                        @endif
                                        
                                        <!-- <iframe width="420" height="315" src="//www.youtube.com/embed/mBCizetiYEU" frameborder="0" allowfullscreen></iframe> -->
                                    </div>

                                    <div>

                                        {!! Form::open(
                                            array(
                                                'method' => 'PUT',
                                                'route' => array('topic_uploads.update',$topic->id) ,
                                                'novalidate' => 'novalidate',
                                                'files' => true)) !!}

                                        <div class="form-group">
                                            {!! Form::file('file', null) !!}
                                            {!! Form::submit('Upload') !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endforeach
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Tutorials Feed Tab -->
                <div id="tutorials" class="container tab-pane fade">
                    <h4>Tutorials Feed</h4><br>
                    <!--
                    1. Posts made by tutor ordered by most recent to least recent. 
                    2. Students can comment/like
                    3. Sorted by tags? 

                    -->
                </div>

                <!-- Resource Hub Tab -->
                <div id="resource" class="container tab-pane fade">
                    <h4>Resource Hub</h4><br>
                    <!--
                    1. Students and tutors can make posts
                    2. Posts ordered by date(in a feed) and tags
                    3. Students and tutors can comment, flag.
                    4. Tutors can remove any posts.

                    -->
                </div>

                <!-- Dicussions Tab -->
                <div id="discussions" class="container tab-pane fade">
                    <h4>Discussions</h4><br>
                    <!--
                        1. Forum threads (topics) -> both students and tutors can create a thread
                        2. Forum posts + comments under each
                        3. Student can like or flag
                        4. Tutor can like, flag, remove any comment

                    -->
                </div>
                <!-- Reviews Tab -->
                <div id="reviews" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="rating-block">
                                    <h4>Average user rating</h4>
                                    <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star-half-alt"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-9">
                        <hr/>
                        <div class="review-block">
                             <div class="row">
                                    <div class="col-sm-3">
                                        <img src="images/profile.png" alt="profile pic" class="mr-3 mt-3 rounded-circle" style="width:50px;">
                                        <div class="review-block-name"><a href="#">nktailor</a></div>
                                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-rate">
                                                <span><i class="text-warning fa fa-star"></i></span>
                                                <span><i class="text-warning fa fa-star"></i></span>
                                                <span><i class="text-warning fa fa-star"></i></span>
                                                <span><i class="text-warning fa fa-star"></i></span>
                                                <span><i class="text-warning fa fa-star-half-alt"></i></span>
                                        </div>
                                        <div class="review-block-title">this was nice in buy</div>
                                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                                    </div>    
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="images/profile.png" alt="profile pic" class="mr-3 mt-3 rounded-circle" style="width:50px;">
                                        <div class="review-block-name"><a href="#">nktailor</a></div>
                                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-rate">
                                         <span><i class="text-warning fa fa-star"></i></span>
                                         <span><i class="text-warning fa fa-star"></i></span>
                                         <span><i class="text-warning fa fa-star"></i></span>
                                         <span><i class="text-warning fa fa-star"></i></span>
                                         <span><i class="text-warning fa fa-star-half-alt"></i></span>
                                        </div>
                                        <div class="review-block-title">this was nice in buy</div>
                                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="images/profile.png" alt="profile pic" class="mr-3 mt-3 rounded-circle" style="width:50px;">
                                        <div class="review-block-name"><a href="#">nktailor</a></div>
                                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-rate">
                                        <span><i class="text-warning fa fa-star"></i></span>
                                        <span><i class="text-warning fa fa-star"></i></span>
                                        <span><i class="text-warning fa fa-star"></i></span>
                                        <span><i class="text-warning fa fa-star"></i></span>
                                        <span><i class="text-warning fa fa-star-half-alt"></i></span>
                                    </div>
                                    <div class="review-block-title">this was nice in buy</div>
                                    <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                                </div>
                            </div>
                        </div>
                    </div>	
                    <!-- If a student is logged in, show Leave a Review form-->
                    @if(Auth::guard('web')->check())
                        <button class="btn btn-success">I am a student</button>
                    @endif		
                </div>
                   
                </div>
                <!-- Info Tab -->
                <div id="info" class="container tab-pane fade">
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

    //show textarea form for topic
    $(".addText a").click(function(){
        $(this).hide();
        $('.addText form').show();
    });
    $("#cancelText").click(function(){
        $('.addText form').hide();
        $('.addText a').show();
    });
}); 
</script>
@endsection