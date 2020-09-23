<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;
use Illuminate\Support\Facades\Auth;

class VideoUploadController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request) {

        ini_set('max_execution_time', 0);



        if (Auth::check()) {

            if (Auth::user()->role === 'emp') {

                $stud_id = Auth::user()->stud_id;
                $phone_number = Auth::user()->phone_number;


                if ($file = $request->file('videoFile')) {
                    $realpath = $file->getRealPath();

                    $result = Vimeo::upload($realpath, [
                                'name' => $request->videoTitle,
                                'description' => $request->videoDesc,
                                'embed' => [
                                    'buttons' => [
                                        'like' => '0',
                                        'share' => '0',
                                        'watchlater' => '0',
                                        'embed' => '0'
                                    ],
                                    'logos' => [
                                        'vimeo' => '0'
                                    ],
                                    'title' => [
                                        'name' => 'show',
                                        'owner' => 'hide',
                                        'portrait' => 'hide'
                                    ]
                                ],
                                'privacy' => [
                                    'add' => '0',
                                    'view' => 'nobody',
                                    'comments' => 'nobody',
                                    'download' => '0',
                                    'vimeo_logo' => '0'
                                ],
                    ]);

//                return view('video-upload', ['result' => $result]);
                    return response()->json(['success' => 'Video is successfully Uploaded']);
                }
            }else{
                 return redirect()->route('home');
            }
        } else {
//            return View::make('login');
            return redirect()->route('route.teacher_login');
        }
    }

}
