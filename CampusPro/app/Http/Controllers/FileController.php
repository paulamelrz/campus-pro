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
        $size = Input::file('file')->getSize();
        $owner = "the current user";
        $owner_type = "the current user's type";
        $file->storePubliclyAs('upload',$name,'public');
    }
}
