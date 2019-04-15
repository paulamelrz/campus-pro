<?php
namespace App\Http\Controllers;
use App\DiscussionThread;
use App\DiscussionThread_tutor;
use App\Http\Requests\ChannelCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Channel;
use App\Course;
use App\ChannelTopic;
use App\University;
use App\TopicUpload;
use App\Enrollment;
use Auth;
use Carbon\Carbon;
class ChannelController extends Controller
{
  
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'channel_name' => ['required', 'string', 'max:191'],
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
        $new_channels = Channel::all()->sortbyDesc('created_at')->take(4);
        $all_channels = Channel::all();
        return view('channels', compact('new_channels', 'all_channels'));
        
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
        $uni_id = University::where('uni_name', '=', $request["university"])->first();

      
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
            return redirect()->back()->with('error', 'The course code does not exist. Click <a href="/course"> here </a> to add it to our records!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //displays db record
    {
        
    }
    
    public function channelPage($id) //displays channel page 
    {
     //   $stu_threads = DiscussionThread::where('channel_id', $id)->get();
     //   $tutor_threads = DiscussionThread_tutor::where('channel_id', $id)->get();
        $topic_uploads = TopicUpload::all();
        $topics = ChannelTopic::where('channels_id', $id)->get();
        $channel_rec = Channel::where('channel_id', $id)->first();
        $enrollments= Enrollment::where('channels_id', $id)->get();

        return view('/tutor-channel', compact('channel_rec', 'topics', 'enrollments','topic_uploads'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channelInfo = Channel::where('channel_id', $id)->first();
        return redirect()->back()->with( compact('channelInfo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //update record
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
        Channel::where('channel_id', $id)->delete();
       
        return redirect()->back()->with('message', 'Successfully deleted channel!');
    }
}