@extends('layouts.app')

@section('content')

<div class="container-fluid channelpage" style="padding-top:40px;">
<div class="container">
@if(session('topic-success')!= NULL)
    <div class="alert alert-success" role="alert">
        {{ session()->get('topic-success') }}
    </div>
@endif
@if (session('thread-success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('thread-success') }}
    </div>
@endif
@if (session('thread-error'))
    <div class="alert alert-danger" role="alert">
     {!! session()->get('thread-error') !!}
    </div>
@endif
@if(session('enroll-success')!= NULL)
    <div class="alert alert-success" role="alert">
        {{ session()->get('enroll-success') }}
    </div>
@endif
@if(session('unenroll-success')!= NULL)
    <div class="alert alert-warning" role="alert">
        {{ session()->get('unenroll-success') }}
    </div>
@endif
@if(session('textarea-success')!= NULL)
    <div class="alert alert-success" role="alert">
        {{ session()->get('textarea-success') }}
    </div>
@endif

    <header class="bg-secondary align-items-center">
        <img style="height:auto; width:100%;" src="images/banner.png">
    </header>
    <div class="jumbotron" style="background-color:rgba(255, 255, 255, 0.664) !important">
        <div class="row">
            <div class="col-2">

                <?php
                $mypath = \DB::table('channels')->select('thumbnail')->where('channel_id', $channel_rec->channel_id)->first();
                ?>
                @if($mypath->thumbnail != NULL)
                    <img src="<?php echo $mypath->thumbnail; ?>" alt="thumbnail" class="card-profile-img" style="height:140px; width:auto; float:left;">
                @else
                    <img src="../images/imgPlaceholder.png" alt="thumbnail" class="card-profile-img" style="height:140px; width:auto; float:left;">
                @endif
                
            </div>
            <div class="col-8">

                <h2 class="float:right; ">{{$channel_rec->channel_name}}</h2>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star"></i></span>
                                    <span><i class="text-warning fa fa-star-half-alt"></i></span>  
                   <p>by: {{$owner->name}}</p>              
                   <p>{{$enrolled}} enrollments</p><br>
            </div>
            <div class="col-2">
            @if(Auth::guard('web')->check())
             <!-- check if student is enrolled -->
                @if(\DB::table('enrollments')->where('channels_id', $channel_rec->channel_id)->where('stu_id', Auth::user()->id)->first())
                    @foreach($enrollments as $enrollment)
                        @if($enrollment->stu_id == Auth::user()->id)
                            <?php $enrollId = $enrollment->id;?>       
                        @endif
                    @endforeach
                    <form type="hidden" method="post" action="{{route('enrollments.destroy', $enrollId)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Unenroll</button>
                    </form>
                @else
                    <form method="post" action="{{route('enrollments.store')}}">
                    @csrf
                        <input type="hidden" name="stuId" value="{{Auth::user()->id}}"/>
                    @csrf
                        <input type="hidden" name="channelId" value="{{$channel_rec->channel_id}}"/>
                        <button type="submit" class="btn btn-danger"> Enroll</button>
                    </form>
                @endif
            @endif
            </div>
        </div> 
        <!-- Tabs Nav -->
    <ul class="nav nav-tabs" style="margin-bottom:-63px; margin-top:50px;">
          <li class="nav-item active">
                <a class="nav-link scroll" data-toggle="tab" href="#content">Content</a>
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
    <div class="row ">
        <div class="col-md-12">
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
                                            <a class="card-link" href="#topic{{$topic->id}}">{{$topic->title}}</a>
                                        </div>
                                    @endforeach

                                  @if(Auth::guard('tutor')->check())
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
                                  @endif
                                    
                            </div>
                        </div>

                        <!-- Topic Content -->
                        <div class="col-md-9">
                            @foreach($topics as $topic)
                            <div id="topic{{$topic->id}}" class="topic-content">
                                <div class="card mb-2 ">
                                
                                    <div class="card-header">
                                        <h4 style="text-align:center;">{{$topic->title}}</h4>
                                        <div class="row">
                                        @if(Auth::guard('tutor')->check())
                                            <div class="col-sm-2">
                                                {!! Form::open(
                                                    array(
                                                        'method' => 'PUT',
                                                        'route' => array('topic_uploads.update',$topic->id) ,
                                                        'novalidate' => 'novalidate',
                                                        'files' => true)) !!}

                                                <div class="form-group">
                                                    <div class="input-group">  
                                                        {!! Form::file('file', array('class' => 'choosefile','name' => 'file','id'=>'file')) !!}
                                                        <label style="margin-top:15px !important;" data-toggle="tooltip" data-placement="bottom" title="Choose File" for="file"><i class="far fa-file-alt fa-2x" ></i></label>
                                                        <span class="input-group-btn" style="margin-top:20px;">
                                                            {!! Form::button('<i class="fas fa-upload fa-lg"></i>', ['class'=>'uploadpro', 'type'=>'submit']) !!}
                                                        </span>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                        <div class="col">
                                        @if($topic->textarea != NULL)
                                                    
                                            <p>
                                                {{ $topic->textarea}}
                                                <br>
                                            </p>


                                        @endif
                                            @if(Auth::guard('tutor')->check())



                                                    <div class="addText" style="margin-top:10px;">

                                                        @if($topic->textarea == NULL)

                                                        {!! Form::open(
                                                            array(
                                                                'method' => 'PUT',
                                                                'route' => array('topics.update',$topic->id) ,
                                                                'novalidate' => 'novalidate',
                                                                ))
                                                            !!}

                                                            <textarea placeholder="Enter your text here" style="width:100%; height:50%;" name="topicText" required></textarea><br>
                                                            <button id="save" type="submit" class="btn btn-success"> Save</button>
                


                                                        {!! Form::close() !!}

                                                        @else

                                                            <button  data-toggle="modal" data-target="#edit" class="btn addchannel">
                                                                <i class="fas fa-plus-circle"></i>Edit
                                                            </button>

                                                        <!-- Modal Body-->
                                                            <div class="modal fade chan-modal  mx-auto" id="edit" style="margin: 0;top: 50%;">

                                                                {!! Form::open(
                                                            array(
                                                                'method' => 'PUT',
                                                                'route' => array('topics.update',$topic->id) ,
                                                                'novalidate' => 'novalidate',
                                                                ))
                                                            !!}

                                                                
                                                                <textarea placeholder="Enter your text here" style="width:100%; height:50%;" name="topicText" required></textarea><br>
                                                                <button id="save" type="submit" class="btn btn-success"> Save</button>
                                                                <button id="cancelText" type="button" class="btn btn-secondary"> Cancel</button>


                                                                {!! Form::close() !!}


                                                            </div>
                                                            @endif
                                                    </div>

                                            @endif
                                        </div>
                                        </div>
                                    </div>


                                    <div class="card-body">


                                        @foreach($topic_uploads as $topic_upload)

                                           @if($topic_upload->topic_id == $topic->id)

                                               @if($topic_upload->extension == "mp4")
                                                   <video width="480" height="360" controls>
                                                       <source src="{{asset('Topic_File_Uploads/'.$topic_upload->filename)}}" type="video/mp4">
                                                       <source src="{{asset('Topic_File_Uploads/'.$topic_upload->filename)}}" type="video/ogg">
                                                       Your browser does not support the video tag.
                                                   </video>
                                                <?php
                                                    $upload_title = str_replace("_", " ", $topic_upload->filename);
                                                    ?>

                                                    {{"Title: " . $upload_title}}

                                                   <br><br>

                                                @endif

                                                   @if($topic_upload->extension == "mpga")
                                                       <audio width="480" height="360" preload="auto" controls>
                                                           <source src="{{asset('Topic_File_Uploads/'.$topic_upload->filename)}}" type="audio/mp3">
                                                           Your browser does not support the audio tag.
                                                       </audio>

                                                       <br><br>

                                                       <?php
                                                       $upload_title = str_replace("_", " ", $topic_upload->filename);
                                                       ?>

                                                       {{"Title: " . $upload_title}}

                                                       <br><br>


                                                       <br>
                                                   @endif
                                                   @if($topic_upload->extension == "pdf")
                                                       <object data="{{asset('Topic_File_Uploads/'.$topic_upload->filename)}}" type="application/pdf" width="480" height="360">
                                                           <p>Alternative text - include a link <a href="{{print $topic_upload->src}}">to the PDF!</a></p>
                                                       </object>

                                                       <br><br>

                                                       <?php
                                                       $upload_title = str_replace("_", " ", $topic_upload->filename);
                                                       ?>

                                                       {{"Title: " . $upload_title}}

                                                       <br><br>


                                                   @endif
                                                @endif
                                        @endforeach
                                    </div>

                                   
                                </div>
                            </div>
                            @endforeach
                            <br><br><br>
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
                    
                    <!--
                    1. Students and tutors can make posts
                    2. Posts ordered by date(in a feed) and tags
                    3. Students and tutors can comment, flag.
                    4. Tutors can remove any posts.

                    -->
                    <img src="{{asset('/images/giphy.gif')}}"><br><br>
                </div>

                <!-- Dicussions Tab -->
                <div id="discussions" class="container tab-pane fade">
                 <br>

                    <!--
                        1. Forum threads (topics) -> both students and tutors can create a thread
                        2. Forum posts + comments under each
                        3. Student can like or flag
                        4. Tutor can like, flag, remove any comment


                    -->
                    <div class="row">

                        <!-- Discussion sidebar -->
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <div style="color:white;" class="card-header bg-dark">
                                    <h5>Tutor Threads</h5>
                                </div>
                                @if($tutor_threads!=NULL)
                                    @foreach($tutor_threads as $tut_thread)
                                        <div class="card-header threads">
                                            <a class="card-link" href="#thread{{$tut_thread->id}}">{{$tut_thread->title}}</a>
                                        </div>
                                    @endforeach
                                @endif                                       
                                @if(Auth::guard('tutor')->check())
                                    <div class="card-header addThread">
                                        
                                        <button data-toggle="modal" data-target="#create-thread" class="btn btn-success" type="submit"> Create thread</button>
                                    </div>
                                @endif
                                            <!-- Create Thread modal-->
                                            <div class="modal fade chan-modal  mx-auto" id="create-thread">
                                                <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header createchannel-header">
                                                            <h4 class="modal-title" style="color:white;">Create Thread</h4>
                                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                                        </div>

                                                        <!-- Modal Body-->
                                                        <div class="modal-body">
                                                            
                                                            @if(Auth::guard('web')->check())
                                                                <form method="post" action="{{route('discussion_thread_tutors.store')}}">
                                                                    <!-- channel_id (hidden) + title + body of thread -->
                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <input type="hidden" class="form-control" id="channelId" value="{{$channel_rec->channel_id}}" name="channelId"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <input type="text" class="form-control" id="threadTitle" placeholder="Thread Title" name="threadTitle" required/>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <input type="text" class="form-control" id="threadBody" placeholder="Thread Description" name="threadBody" required/>
                                                                    </div>

                                                                    <div class="row justify-content-md-center">
                                                                    <div class="col-sm-3">
                                                                    <input type="submit" class="btn" style="background-color:#2DC7B2 !important; color:white;" value="Submit"/>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </div>

                                                                </form>
                                                            
                                                            @elseif(Auth::guard('tutor'))
                                                            <form method="post" action="{{route('discussion_thread_tutors.store')}}">
                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <input type="hidden" class="form-control" id="channelId" value="{{$channel_rec->channel_id}}" name="channelId"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <input type="text" class="form-control" id="threadTitle" placeholder="Thread title" name="threadTitle" required/>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        @csrf
                                                                        <textarea type="text" class="form-control" id="threadBody" placeholder="Thread Description" name="threadBody" required></textarea>
                                                                    </div>

                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col-sm-3">
                                                                        <input type="submit" class="btn" style="background-color:#2DC7B2 !important; color:white;" value="Submit"/>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                            @endif
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                            </div>
                            <div class="card mb-2">
                                <div style="color:white;" class="card-header bg-dark">
                                    <h5>Student Threads</h5>
                                </div>
                                @if($stu_threads!=NULL)
                                    @foreach($stu_threads as $thread)
                                        <div class="card-header stu-threads">
                                            <a class="card-link" href="#stu-thread{{$thread->id}}">{{$thread->title}}</a>
                                        </div>
                                    @endforeach
                                @endif                                       
                                @if(Auth::guard('web')->check())
                                    <div class="card-header addThread">
                                        <button data-toggle="modal" data-target="#create-thread" class="btn btn-success" type="submit"> Create thread</button>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <!-- Discussion Content -->
                        <div class="col-md-9">
                            @foreach($tutor_threads as $tut_thread)
                                <div id="thread{{$tut_thread->id}}" class="thread-content">
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">{{$tut_thread->title}}</h4>
                                        </div>
                                        <div style="text-align:center!important;" class="card-body bg-white">
                                        <p>{{$tut_thread->body}}</p>
                                        </div>
                                        <div class="card-footer bg-white">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($stu_threads as $thread)
                                <div id="stu-thread{{$thread->id}}" class="stu-thread-content">
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <h4 style="text-align:center;">{{$thread->title}}</h4>
                                        </div>
                                        <div style="text-align:center!important;" class="card-body bg-white">
                                        <p>{{$thread->body}}</p>
                                        </div>
                                        <div class="card-footer bg-white">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
                        
                        <div class="review-block">
                             <!-- If a student is logged in, show Leave a Review form-->
                            @if(Auth::guard('web')->check())
                          
                                    <h5> Write a review!</h5>
                                        <form method="POST" action="{{route('channel_reviews.store')}}" >
                                            <div class="form-group">
                                                @csrf
                                                <input type="hidden" id="channelId" name="channelId" value="{{$channel_rec->channel_id}}"/>
                                            </div>
                                            <div class="form-group">
                                                @csrf
                                                <input style="width:70% !important;" type="text" name="title" id="title" placeholder="Title of Review" required/><br><br>
                                            </div>
                                            <div class="form-group">
                                                @csrf
                                                <textarea style="width:70% !important;" id="comment" name="comment" rows="4" cols="50" placeholder="What is your expericence with this channel?"></textarea><br>
                                            </div>
                                            <div class="form-group">
                                                @csrf
                                                <label>Rate this channel out of 5</label>
                                            
                                                <select id="stars" name="stars" style="margin-bottom:10px;">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <br>
                                            <button id="add" class="btn btn-success" type="submit">Submit Review</button>
                                        </form>
                            @endif	
                            <hr/>
                            @foreach($reviews as $review)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="images/profile.png" alt="profile pic" class="mr-3 mt-3 rounded-circle" style="width:50px;">
                                        <?php $student=\DB::table('students')->where('id', $review->stu_id)->first()?>
                                        <div class="review-block-name"><a href="#">{{$student->name}}</a></div>
                                        <div class="review-block-date">{{$review->created_at}}</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-rate">
                                                @for($i=1; $i<=$review->stars; $i++)
                                                    <span><i class="text-warning fa fa-star"></i></span>
                                                @endfor
                                        </div>
                                        <div class="review-block-title">{{$review->title}}</div>
                                        <div class="review-block-description">{{$review->comment}}</div>
                                    </div>    
                                </div>
                                <hr/>
                            @endforeach
                            
                            
                        </div>
                        	
                    </div>	
                   
                </div>
                   
                </div>
                <!-- Info Tab -->
                <div id="info" class="container tab-pane fade">
                    <!--
                    1. Display channel description. Allow tutor to edit
                    2. Display list of enrolled students
                    -->
                    <div class="list-group card-list-group" >
                        <div class="row justify-content-center h-100">   
                            <div class="col-sm-6 mb-3 ">
                                <div style="text-align:center!important;" class="card-header">
                                    <h5>Channel Description</h5>
                                </div>
                                <div style="text-align:center!important;" class="card-body bg-white">
                                    <p>{{$channel_rec->description}}</p>
                                </div>
                                <div class="card-footer bg-white">
                                </div>     
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div style="text-align:center!important;" class="card-header">
                                    <h5>Tutor Info</h5>
                                </div>
                                <div style="text-align:center!important;" class="card-body bg-white">
                                    <p>Name: {{$owner->name}}</p><br>
                                    <p>Email: {{$owner->email}}</p>
                                </div> 
                                <div class="card-footer bg-white">
                                </div>     
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <div style="text-align:center!important;" class="card-header">
                                    <h5>Enrolled Students</h5>
                                </div> 
                                <div class="card-body bg-white">
                                <div class="row">
                                   @foreach($enrollments as $enrollment)
                                   @if($channel_rec->channel_id == $enrollment->channels_id)
                                   
                                        <div class="col-sm">
                                            
                                                
                                                    <img src="images/profile.png" alt="profile pic" class="mr-3 mt-3 rounded-circle" style="width:50px;">
                                                    <?php $student=\DB::table('students')->where('id', $enrollment->stu_id)->first()?>
                                                    <div class="review-block-name"><a href="#">{{$student->name}}</a></div>
                                                   
                                                
                                                  
                                            
                                        </div>
                                    
                                    @endif
                                   @endforeach
                                   </div>
                                                                
                                </div> 
                                <div class="card-footer bg-white">
                                                                
                                </div>                             
                               
                            </div>
                        </div>
                    </div>
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
    
//topic links navigation
$('.topic-content').not('#topic1').css("display", "none");
$('.topics a').click(function(event) {
  event.preventDefault();
  
  // Toggle active class on tab buttons
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");
  
  // display only active tab content
  var activeTab = $(this).attr("href");
  $('.topic-content').not(activeTab).css("display","none");
  $(activeTab).fadeIn();
  
});

//thread links navigation
$('.thread-content').not('#thread1').css("display", "none");
$('.threads a').click(function(event) {
  event.preventDefault();
  
  // Toggle active class on tab buttons
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");
  
  // display only active tab content
  var activeTab = $(this).attr("href");
  $('.thread-content').not(activeTab).css("display","none");
  $(activeTab).fadeIn();
  
});
    
$('.stu-thread-content').not('#stu-thread1').css("display", "none");
$('.stu-threads a').click(function(event) {
  event.preventDefault();
  
  // Toggle active class on tab buttons
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");
  
  // display only active tab content
  var activeTab = $(this).attr("href");
  $('.stu-thread-content').not(activeTab).css("display","none");
  $(activeTab).fadeIn();
  
});
}); 
</script>
@endsection