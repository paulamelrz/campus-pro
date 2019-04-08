@extends('layouts.app')

@section('title', 'Tutor Dashboard')

@section('content')<script type="text/javascript">
    $(document).ready(function(){
        $("#mybtn").click(function(){
            $("#create-channel").modal('show');
        });
    });
</script>
@if (session('error')||session('success'))
    <script type="text/javascript">
        $(function() {
            $('#create-channel').modal('show');
        });
       
    </script>
@endif

<div class="container tutprofcont">
    <div class="row">
        <div class = "col-sm-4">
            <div class="tutprofpic">
                <img src="{{ asset('images/math.png') }}" alt="Profile Picture">
            </div>
        </div>

        <div class = "col-sm-5">
         

        </div>

        <div class="col-sm-3">
        
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="media border p-3">
                <img src="images/profile.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h4>{{Auth::user()->name}} @if(Auth::user()->verified == 1)<img src="images/verified.png" style="width:30px;">@endif</h4>
                    <p class="fa fa-envelope">{{Auth::user()->email}}</p>
                </div>
            </div>
            </div><br><br>
        </div>
    </div>
</div>
            
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
        <h4>My Channels</h4>
        <div class="card" style="">
            <a data-toggle="modal" data-target="#create-channel" style="width:200px;" type="submit" class="btn btn-success">
                    {{ __('Create Channel') }}
            </a>
            <div class="row">
                
                @foreach($channels as $channel)
                                
                    <div class="col-md-3 mb-3">
                                
                        <div class="card h-100">
                         <img class="card-img-top" src="images/thumbnail.png" alt="channel thumbnail">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{route('channel.page', $channel->channel_id)}}">{{$channel->channel_name}}</a>
                               </div>
                                <div class="card-text">
                                    <p>{{$channel->description}}</p>
                                </div>
                            </div>
                           
                            <div class="card-footer">
                                                
                            </div>
                        </div>
                    </div>           
                @endforeach
                    
            </div><br>
            
        </div>
        </div>
    </div>
</div>

<!--Create Channel Modal -->
<div class="modal fade" id="create-channel">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Channel</h4>
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
                <form method="post" action="/create-channel">

                    <div class="form-group">
                        @csrf
                        <label for="channel_name">Channel Name:</label>
                        <input type="text" class="form-control" id="channel_name" placeholder="Enter channel name" name="channel_name" required/>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control" id="course_code" placeholder="e.g. COMP3365" name="course_code" required/>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="university">University:</label>
                        <input type="text" class="form-control" id="university" placeholder="e.g. University of the West Indies Cave Hill" name="university" required/>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="description">Description:</label>
                        <textarea type="text" class="form-control" id="description" placeholder="What's this channel about?" name="description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Submit"/>

                </form>
               
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

@endsection
