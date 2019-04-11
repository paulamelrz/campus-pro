<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{

    public function store(Request $request)
    {
        /**
         * @var UploadedFile
         */

        $file = $request->file('file');
        $name = Input::file('file')->getClientOriginalName();
        $path = "CampusPro\\public\\upload\\".$name;
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
        $extension = Input::file('file')->getClientOriginalExtension();
        $size = Input::file('size')->getSize();
        $owner = "the current user";
        $file->storePubliclyAs('upload',$name,'public');
    }
}
