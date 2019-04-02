@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Course</h1>
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
        <form method="post" action="/create-course">

            <div class="form-group">
                @csrf
                <label for="course_code">Course Code:</label>
                <input type="text" class="form-control" id="course_code" placeholder="e.g. COMP3365" name="course_code" required/>
            </div>
            <div class="form-group">
                @csrf
                <label for="course_name">Course Code:</label>
                <input type="text" class="form-control" id="course_name" placeholder="e.g. Calculus 1" name="course_name" required/>
            </div>
            <div class="form-group">
                @csrf
                <label for="university">University:</label>
                <input type="text" class="form-control" id="university" placeholder="e.g. University of the West Indies Cave Hill" name="university" required/>
            </div>
            <div class="form-group">
                @csrf
                <label for="description">Course description:</label>
                <textarea type="text" class="form-control" id="description" placeholder="What's this course about?" name="description"></textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Submit"/>
        </form>

    </div>


@endsection
