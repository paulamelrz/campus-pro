<?php

namespace App\Http\Controllers;
use App\Course;
use App\University;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:tutor');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'course_code' => ['required', 'varchar', 'max:255'],
            'university' => ['required', 'string', 'max:70'],
            'course_name' => ['required', 'string', 'max:55'],
            'description' => ['required', 'text']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create-course');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //validate forms


        //search for university id in university's table
        $uni_rec = University::where('uni_name', $request['university'])->first();
        //Auth::user()->id

        //check if course exists, if it does, return error message. Otherwise add to db
        if (true == ( Course::where('course_code', $request->course_code)->where('uni_id', $uni_rec->id)->exists() ) )
        {
            return redirect()->back()->with('error', 'This course already exists! Click <a href="/tutor"> here</a> to create a channel for it');
        }
        else
            {
                $newcourse = Course::create([
                    'course_code' => $request['course_code'],
                    'uni_id'=> $uni_rec->id,
                    'course_name' => $request['course_name'],
                    'course_description' => $request['description']
                ]);
                //check if course was created successfully
                if (! $newcourse)
                {
                    return redirect()->back()->with('error', 'Error: Course could not be added to our records. Please try again later.');
                }

                return redirect()->back()->with('success', 'Successfully added new course!');
            }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
