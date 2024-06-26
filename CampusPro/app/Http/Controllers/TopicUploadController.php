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
        //
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
        /**
         * @var UploadedFile
         */


        $file_id = 'file'.$id;


        $file = $request->file($file_id);
        $name = $request->file($file_id)->getClientOriginalName();
        $name = str_replace(' ', '_', $name);
        $stored_name = "topic_".$id."_file_" . $name;
        $path = "..\\..\\Topic_File_Upload\\topic_".$id."_file_" . $name;
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
        $size = Input::file($file_id)->getSize();
        $ext = $request->file($file_id)->extension();

        $file->storePubliclyAs('Topic_File_Uploads', "topic_".$id."_file_" . $name, 'public');

        \DB::table('topic_uploads')->insert(
            ['filename' => $stored_name,
                'src' => $path,
                'size' => $size,
                'topic_id' => $id,
                'extension' => $ext,
            ]);

        return back();
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
