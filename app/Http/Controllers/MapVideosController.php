<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MapVideo;

class MapVideosController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateMapVideo($request)
    {

        $rules = [
            'standardDD' => 'required',
            'subjectDD' => 'required',
            'lessonDD' => 'required',
            'sectionDD' => 'required',
            'titleDD' => 'required',
            'video_id' => 'required'
        ];

        $message = [
            'required' => 'This Field is Required.'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function save(Request $request)
    {

        $this->validateMapVideo($request);
        $map_video = new MapVideo;

        $map_video->standard_id = $request->standardDD;
        $map_video->subject_id = $request->subjectDD;
        $map_video->lesson_id = $request->lessonDD;
        $map_video->section_id = $request->sectionDD;
        $map_video->title_id = $request->titleDD;
        $map_video->video_id = $request->video_id;
        

        // $map_video = MapVideo::Create(
        //     ['standard_id' => request('standardDD')],
        //     ['subject_id' => request('subjectDD')],
        //     ['lesson_id' => request('lessonDD'),'section_id' => request('sectionDD'),'title_id' => request('titleDD'),'video_id' => request('video_id')]
        // );
        if ($map_video->save()) {
            return response()->json(['success' => 'Video Mapping Added Successfully.']);
        } else {
            return response()->json(['failure' => 'Video Mapping Not Added']);
        }
    }

    public function view()
    {
        $allCourses = MapVideo::all();
        if ($allCourses) {
          return view('all-courses', compact('allCourses')); 
        } 
    }
}
