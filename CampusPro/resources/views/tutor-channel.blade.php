@extends('layouts.app')

@section('content')

<div class="container">
    <header class="bg-secondary align-items-center">
        <!-- <div class="container h-100">
        <div class="row h-100 align-items-center">
                <div class="col-lg-12"> -->
                    <img style="height:auto; width:100%;"src="images/banner-placeholder.jpg">
                <!-- </div>
            </div>
        </div> -->
    </header>
    <p>{{$channel_rec->channel_name}}</p>
</div>

@endsection