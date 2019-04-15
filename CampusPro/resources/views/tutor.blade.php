
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
                @if(!is_null(\DB::table('tutor_profile_pics')->select('tutor_id')->where('tutor_id', Auth::user()->id)->first()))

                    <?php
                    $mypath = \DB::table('tutor_profile_pics')->select('src')->where('tutor_id', Auth::user()->id)->first();
                    ?>
                    <img src=' <?php echo $mypath->src; ?>' alt="profile picture"  class="mr-3 mt-3 ml-4 rounded-circle" style="height:90px; width:90px;">
                @else

                    <img src="../../images/profile.png" alt="profile picture" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                @endif



                <div>
                    <form action = "{{route('file.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="context-tag" value="tutor-profile">
                    <input type="file" name="file" id="file">
                    <button type="submit">Upload</button>
                    </form>
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
                        <!--
                            <div class="form-group">
                                <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
                                <div id="countryList">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            </div>
                        -->
                        <input type="text" class="form-control" id="university" placeholder="e.g. University of the West Indies Cave Hill" name="university" required/>
                        <div id="universityList"></div>
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

<script>
$(document).ready(function(){

 $('#country_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#country_name').val($(this).text());  
        $('#countryList').fadeOut();  
    });  

});
</script>
 
@endsection

