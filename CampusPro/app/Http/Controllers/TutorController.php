<?php

namespace App\Http\Controllers;
use App\Tutor;
use App\Channel;
use Auth;
use Doctrine\DBAL\Types\BigIntType;
use Illuminate\Http\Request;



class TutorController extends Controller
{
    public $channels;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:tutor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function getChannels(BigIntType $id)
//    {
//
//    }
    public function index()
    {
        //where parameters: (name of column, value being compared against)
       $channels = Channel::where('tutor_id', Auth::user()->id)->get();
        return view('tutor', compact('channels'));
    }
}
