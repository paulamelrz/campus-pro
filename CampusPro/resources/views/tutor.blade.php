
@extends('layouts.app')

@section('content')

<script type="text/javascript">
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
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="media border p-3">
                @if(Auth::user()->img_url != null)
                    <p>Output profile picture here</p>
                @else
                    <img src="../../images/profile.png" alt="profile picture" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                @endif



                <div>
                    <form action = "{{route('file.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="file" name="file" id="file">
                    <button type="submit">Upload</button>
                </div>


                

                <div class="media-body">
                    <h4>{{Auth::user()->name}} @if(Auth::user()->verified == 1)<img src="images/verified.png" style="width:30px;">@endif</h4>
                    
                    <div class="row">
                        @if(Auth::user()->university!= null)
                            <div class="col-sm">
                                <p><i class="fas fa-university"></i> {{Auth::user()->university}}</p>
                            </div>    
                        @endif

                        <div class="col-sm">
                            <p><i class="far fa-envelope"></i> {{Auth::user()->email}}</p>
                        </div>
                        
                    </div>
                    @if(Auth::user()->country!= null)
                        <p><i class="fas fa-globe-americas"></i> {{Auth::user()->country}}</p>
                    @endif
                        
                </div>
            </div>
            </div><br><br>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
        <h4 style="float:left;">My Channels</h4>
       
        <div style="float:right;">
            <button  data-toggle="modal" data-target="#create-channel" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Add Channel
            </button>
            
        </div>
        <br><br>
        <div class="card" style="border:none;">
           
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
                                <div>
                                    <button class="btn btn-secondary">
                                        <i style='font-size:13px;float:right;' class="fas fa-edit"></i>
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
                <form method="post" action="{{route('channels.store')}}">

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

