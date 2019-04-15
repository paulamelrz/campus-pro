@extends('layouts.app')

@section('content')

    <div class="container-fluid loginbody">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card logincard mx-auto">
                <div class="card-header logincard-head" style="text-align:center;">
                    <p class="form-title">Create a Course</p>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {!! session()->get('error')!!}
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="/create-course">
                        <div class="form-group">
                            @csrf
                            <input type="text" class="form-control" id="course_code" placeholder="Course Code e.g. COMP3365" name="course_code" required/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="text" class="form-control" id="course_name" placeholder="Course Name e.g. Calculus 1" name="course_name" required/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="text" class="form-control" id="university" placeholder="University e.g. University of the West Indies Cave Hill" name="university" required/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <textarea type="text" class="form-control" id="description" placeholder="What's this course about?" name="description"></textarea>
                        </div>

                        <div class="row">
                            <input type="submit" class="btn login-button mx-auto" style="color:white !important;" value="Submit"/>
                        </div>
                         <p class="formtext" style="text-align:center;margin-top:10px;"> Changed your mind? <a class="formtext"  href="{{ route('tutor') }}">Back to My Channels</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
