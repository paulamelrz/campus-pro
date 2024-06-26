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

<br><br>
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
        </div>
        <div class="list-group card-list-group channels">
        <div class="row">
         @if($channels!=NULL)
            @foreach($channels as $channel)
                @foreach($channel as $channel_rec)
                
                <div class="col-md-4  mx-auto" style="padding-top:20px;">

                    <div class="card">

                    <img class="card-img-top" src="images/thumbnail.png" alt="channel thumbnail">
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{route('channel.page', $channel_rec->channel_id)}}">{{$channel_rec->channel_name}}</a>
                        </div>
                            <div class="card-text">
                                <p>{{$channel_rec->description}}</p>
                            </div>
                        </div>

                        <div class="card-footer" style="background-color:white !important">
                   
                        </div>
                    </div>
                </div>  

                @endforeach         
            @endforeach
         @else
            <div class="col-md-12" style="padding-top:20px;">
                <h6>You are currently not enrolled on any channels. </h6>
                <br><br><a type="button" href="/stuChannels" class="btn btn-secondary">Find Channels</a>
                <div class="col-md-12" style="padding-top:20px;">
            </div>
         @endif
            </div>

            
                </div>
            </div>
        </div>
        </div>
    
        </div>
    </div>
</div>

 
@endsection