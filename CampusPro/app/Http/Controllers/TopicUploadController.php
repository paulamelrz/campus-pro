<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model;
use Auth;

class TopicUploadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:tutor');
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
        /**
         * @var UploadedFile
         */

        if (Input::file('file')->isValid()) {
            $file = $request->file('file');
            $name = $request->file('file')->getClientOriginalName();
            $ext = $request->file->extension();
            $owner = Auth::user()->id;
            $path = "..\\..\\tutor_profile_pic_upload\\profile_pic_" . $owner . "." . $ext;
            $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
            $size = Input::file('file')->getSize();
           // $created = date("Y-m-d H:i:s", $uploaded_at = $request->file('file')->getCTime());
            //echo \DB::table('tutor_profile_pics')->select('src')->where('tutor_id', Auth::user()->id)->get();

            $file->storePubliclyAs('tutor_profile_pic_upload', "profile_pic_" . $owner . "." . $ext, 'public');

                \DB::table('topic_uploads')->insert(
                    ['filename' => $name,
                        'src' => $path,
                        'size' => $size,
                        'tutor_id' => $owner
                    ]);

            return back();
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
