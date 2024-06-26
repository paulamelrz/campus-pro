<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\Channel;
use Auth;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $enrollments = Enrollment::where('stu_id', Auth::user()->id)->get();
        if(isset ($enrollments[0])){
            $x = 0;
            foreach($enrollments as $enrollment)
            {

                $channels[$x] = Channel::where('channel_id', $enrollment->channels_id)->get();
                $x++;
            }
            //dd($channels);
            return view('student', compact('enrollments', 'channels'));
        }
        $channels=[];
        return view('student', compact('enrollments', 'channels'));
    }

}
