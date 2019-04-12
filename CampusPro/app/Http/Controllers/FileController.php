<?php
//TUTOR PROFILE PIC UPLOAD CONTROLLER
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model;
use Auth;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:tutor');
    }

    public function store(Request $request)
    {
        /**
         * @var UploadedFile
         */
        if (Input::file('file')->isValid())
        {
            $file = $request->file('file');
            $ext = $request->file->extension();
            $owner = Auth::user()->id;
            $path = "..\\..\\tutor_profile_pic_upload\\profile_pic_".$owner.".".$ext;
            $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
            $size = Input::file('file')->getSize();
            $created = date ("Y-m-d H:i:s", $uploaded_at = $request->file('file')->getCTime());

            //echo \DB::table('tutor_profile_pics')->select('src')->where('tutor_id', Auth::user()->id)->get();


            $file->storePubliclyAs('tutor_profile_pic_upload', "profile_pic_".$owner.".".$ext, 'public');

            if(is_null(\DB::table('tutor_profile_pics')->select('tutor_id')->where('tutor_id', $owner)->first()))
            {
                \DB::table('tutor_profile_pics')->insert(
                    ['filename' => "profile_pic_".$owner,
                        'src' => $path,
                        'size' => $size,
                        'tutor_id' => $owner,
                        'created_at' => $created
                    ]);


            }else {

                \DB::table('tutor_profile_pics')
                    ->where('tutor_id', $owner)
                    ->update(
                        ['filename' => "profile_pic_".$owner,
                            'src' => $path,
                            'size' => $size,
                            'created_at' => $created
                        ]);

            }
            return back();

        }
    }
}
