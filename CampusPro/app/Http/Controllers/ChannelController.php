<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChannelCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Channel;
use App\Course;
use App\University;
use Auth;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:tutor');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'channel_name' => ['required', 'string', 'max:255'],
            'course_code' =>['required', 'string', 'max:191'],
            'university'=>['required', 'string', 'max:70'],
            'description' => ['string', 'max:255']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request) //puts info in db table
    {

        //$this->validator($request->all())->validate();

        //check if course_code entered is in the courses table. If not, create course record.

        $uni_id = University::where('uni_name', $request["university"])->first();
       // dd($uni_id);
        $course_rec = Course::where('course_code', $request->course_code)->where('uni_id', $uni_id->id)->first();


        if(isset($course_rec))
        {
            Channel::create([
                'channel_name' => $request['channel_name'],
                'tutor_id'=> Auth::user()->id,
                'course_id' => $course_rec->id,
                'description' => $request['description']
            ]);
//(route('tutor'))
            return redirect()->back()->with('success', 'Channel created successfully!');
        }
        else
        {
            return redirect()->back()->with('error', 'The course code does not exist. Press "create course" to add it to our records!');
        }
/*
        $validated = $request->validated();
        $validated['tutor_id']=Auth::user()->id;
        $validated['course_id']=1;

        Channel::create($validated);
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //displays db record
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
    public function update(ChannelCreateRequest $request, $id) //update record
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //delete record in db
    {
        //
    }
}
