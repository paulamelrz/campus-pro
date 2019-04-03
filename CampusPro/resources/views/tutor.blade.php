@extends('layouts.app')

@section('content')<script type="text/javascript">
    $(document).ready(function(){
        $("#mybtn").click(function(){
            $("#create-channel").modal('show');
        });
    });
</script>
@if (session('error'))
    <script type="text/javascript">
        $(function() {
            $('#create-channel').modal('show');
        });
        $(document).ready(function(){
            $("#create-course").show();
        });
    </script>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header float-sm-right">TUTOR Dashboard

                </div>

                <div class="card-body">
                    Welcome back <strong> {{Auth::user()->name}}

                    </strong>!
                </div>
            </div><br><br>
            <div class="card">
                <div class="row">

                    @foreach($channels as $channel)
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">
                                    <a href="/channel-page{$channel->id}">{{$channel->channel_name}}</a>
                                </div>
                                <div class="card-body">
                                    {{$channel->description}}
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div><br>
                <a data-toggle="modal" data-target="#create-channel" style="width:200px;" type="submit" class="btn btn-primary">
                    {{ __('Create Channel') }}
                </a>

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
                        {{ session()->get('error')}}
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
                <a href="/course" id="create-course" style="width:200px; display:none; float:right;" class="btn btn-primary">
                    {{ __('Create Course') }}
                </a>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endsection
