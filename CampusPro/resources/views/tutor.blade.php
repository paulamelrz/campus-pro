@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<script type="text/javascript">
    $(document).ready(function(){
        $("#mybtn").click(function(){
            $("#create-channel").modal('show');
        });
    });
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
}); 
</script>

@if (session('error')||session('success'))
    <script type="text/javascript">
        $(function() {
            $('#create-channel').modal('show');
        });
       
    </script>
@endif



<div class="container-fluid profilebody">


<div class="container">
    <div class="row">
        <div class="col-lg-4">
        <div class="card card-profile">
        <div style="background-image: url(../images/profileheader.jpg);" class="header-profile"></div>
        <div class="card-body text-center">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if(!is_null(\DB::table('tutor_profile_pics')->select('tutor_id')->where('tutor_id', Auth::user()->id)->first()))

            <?php
            $mypath = \DB::table('tutor_profile_pics')->select('src')->where('tutor_id', Auth::user()->id)->first();
            ?>
                <img src=' <?php echo $mypath->src; ?>' alt="profile picture"  class="card-profile-img" style="height:110px; width:110px;">
            @else
                <img src="../../images/profile.png" alt="profile picture" class="card-profile-img" style="width:60px;">
            @endif
        
                <form action = "{{route('file.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="context-tag" value="tutor-profile">
                    <input type="file" name="file" id="file"  class="choosefile">
                    <label data-toggle="tooltip" data-placement="bottom" title="Choose File" for="file"><i class="far fa-image fa-2x" ></i></label>
                    <button data-toggle="tooltip" data-placement="bottom" title="Upload image" type="submit" class="uploadpro"><i class="fas fa-upload fa-lg"></i></button>
                </form>


        <h4 class="mb-3">{{Auth::user()->name}} @if(Auth::user()->verified == 1)<img src="images/verified.png" style="width:30px;">@endif</h4>
             
        @if(Auth::user()->university!= null)
             <p><i class="fas fa-university"></i> {{Auth::user()->university}}</p> 
        @endif
            <p><i class="far fa-envelope"></i> {{Auth::user()->email}}</p>
        @if(Auth::user()->country!= null)
            <p><i class="fas fa-globe-americas"></i> {{Auth::user()->country}}</p>
        @endif


        <button class="btn btn-outline-dark btn-sm"><span class="fas fa-pencil-alt"></span> Edit Profile</button>
        </div>
        </div>
    
       
        </div>
        <div class="col-lg-8">
        <div class="card card-mychannel">
        <div class="header-profile">
                    <h4 style="float:left;">My Channels</h4>

                    <div style="float:right;">
                        <button  data-toggle="modal" data-target="#create-channel" class="btn addchannel">
                            <i class="fas fa-plus-circle"></i> Add Channel
                        </button>

                    </div>
        </div>
        <div class="list-group card-list-group channels">
        <div class="row">

            @foreach($channels as $channel)

                <div class="col-md-4  mx-auto" style="padding-top:20px;">

                    <div class="card ">

                    <img class="card-img-top" src="images/thumbnail.png" alt="channel thumbnail">
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{route('channel.page', $channel->channel_id)}}">{{$channel->channel_name}}</a>
                        </div>
                            <div class="card-text">
                                <p>{{$channel->description}}</p>
                            </div>
                        </div>

                        <div class="card-footer" style="background-color:white !important">
                            <div>
                                <button class="btn btn-secondary">
                                    <i style='font-size:15px;float:right;' class="fas fa-edit"></i>
                                </button>  

                                <form class="delete-channel" style="float:right;" type="hidden" method="post" action="{{route('channels.destroy', $channel->channel_id)}}">    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i style='float:right;' class="fas fa-trash-alt"></i></button>

                                </form>
                            </div>    
                        </div>
                    </div>
                </div>           
            @endforeach

            </div>

            <!--Create Channel Modal -->
            <div class="modal fade chan-modal  mx-auto" id="create-channel">
                <div class="modal-dialog  modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header createchannel-header">
                            <h4 class="modal-title" style="color:white;">Create Channel</h4>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>

                        <!-- Modal Body-->
                        <div class="modal-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                            <form method="post" action="{{route('channels.store')}}">

                                <div class="form-group">
                                    @csrf
                                    <input type="text" class="form-control" id="channel_name" placeholder="Channel Name" name="channel_name" required/>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <input type="text" class="form-control" id="course_code" placeholder="Course Code e.g. COMP3365" name="course_code" required/>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <input type="text" class="form-control" id="university" placeholder="University e.g. University of the West Indies Cave Hill" name="university" required/>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <textarea type="text" class="form-control" id="description" placeholder="What's this channel about?" name="description"></textarea>
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
                        
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

 
@endsection