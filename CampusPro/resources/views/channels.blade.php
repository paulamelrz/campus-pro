@extends('layouts.app')

@section('title', 'Channels')

@section('content')
<div class="container">
<br><br>
<h4>New Channels</h4>

                <!-- Wrapper for carousel items -->
            
                        <div class="row">
                        @foreach($new_channels as $channel)
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <div class="img-box">
                                        <img src="{{ asset('images/math.jpg') }}" class="img-responsive img-fluid" alt="">									
                                    </div>
                                    <div class="card-body">
                                        <h4>{{$channel->channel_name}}</h4>									
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h6>{{$channel->created_at}}</h6>
                                        <a href="{{route('channel.page', $channel->channel_id)}}" class="btn btn-primary">View Channel</a>
                                    </div>						
                                </div>
                            </div>
                            @endforeach
                        </div>   
                        <br>
    <h4>All Channels</h4>
    <br>
                        @foreach($all_courses as $course)

                        <h5>Course: {{$course->course_name}}</h5>

                            <div class="row">

                                @foreach($all_channels as $channel)
                                    @if($course->id == $channel->course_id)
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <div class="img-box">
                                                    <img src="{{ asset('images/compsci.jpg') }}" class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="card-body">
                                                    <h4>{{$channel->channel_name}}</h4>
                                                    <div class="star-rating">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6>{{$channel->created_at}}</h6>
                                                    <a href="{{route('channel.page', $channel->channel_id)}}" class="btn btn-primary">View Channel</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                    @endif
                                @endforeach
                            </div>
                        @endforeach

                
@endsection

