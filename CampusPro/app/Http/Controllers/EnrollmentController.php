<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enrollment;
use App\Channel;

class EnrollmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'channels_id'=> ['required', 'integer'],
           'stuId' => ['required', 'integer'] 
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validator($request->all())->validate();
        Enrollment::create([
            'channels_id' => $request['channelId'],
            'stu_id'=> $request['stuId']
        ]);
        $new_enrollval = Enrollment::where('id', $request['channelId'])->count();
        \DB::table('channels')->where('channel_id', $request['channelId'])->update(['enrollments'=>$new_enrollval]);
        return redirect()->back()->with('enroll-success', 'You have enrolled on this channel!');
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
        Enrollment::where('id', $id)->delete();
        $new_enrollval = Enrollment::where('id', $id)->count();
        Channel::where('channel_id', $id)->update(['enrollments'=>$new_enrollval]); 
       
        return redirect()->back()->with('unenroll-success', 'You have unenrolled from this channel');
    }
}
