<?php

namespace App\Http\Controllers;
use Auth;
use App\DiscussionThread_tutor;
use App\DiscussionThread;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'channel_name' => ['required', 'string', 'max:191'],
        //     'course_code' =>['required', 'string', 'max:191'],
        //     'university'=>['required', 'string', 'max:70'],
        //     'description' => ['string', 'max:255']
        // ]);
    }

    public function __construct()
    {
        $this->middleware('auth:tutor,web');
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
    public function store(Request $request)
    {
        //validate
        //store tutor thread if tutor is logged in
        if(Auth::guard('tutor')){
            DiscussionThread_tutor::create([
                'tutor_id'=> Auth::user()->id,
                'channel_id'=> $request['channelId'],
                'title'=> $request['threadTitle'],
                'body'=> $request['threadBody']
            ]);
        }
        //store student thread if student is logged in
        elseif(Auth::guard('web')){
            DiscussionThread::create([
                'student_id'=> Auth::user()->id,
                'channel_id'=> $request['channelId'],
                'title'=> $request['threadTitle'],
                'body'=> $request['threadBody']
            ]);
        }
        return redirect()->back()->with('thread-success', 'New thread created successfully!');
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
