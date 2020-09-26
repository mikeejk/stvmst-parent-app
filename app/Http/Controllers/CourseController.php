<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Vimeo\Laravel\Facades\Vimeo;

class CourseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {

            //            if (Auth::user()->role === 'stud') {

            $stud_id = Auth::user()->stud_id;
            $phone_number = Auth::user()->phone_number;

            $parents = DB::table('master_family')
                ->where('mobile', $phone_number)->get();

            $students = [];

            foreach ($parents as $parent) {
                $students[] = DB::table('master_students as ms')
                    ->leftjoin('master_official as mo', 'ms.id', '=', 'mo.stud_id')
                    ->leftjoin('master_standard as mst', 'mo.class_id', '=', 'mst.id')
                    ->leftjoin('master_section as msc', 'mo.sec_id', '=', 'msc.id')
                    ->where('ms.id', $parent->stud_id)
                    ->where('mo.stud_id', $parent->stud_id)
                    ->select(
                        'ms.admn_no',
                        'ms.first_name',
                        'ms.last_name',
                        'ms.dob',
                        'ms.gender',
                        'mst.standard',
                        'msc.section',
                        'mo.emis',
                        'mo.doa',
                        'mo.class_id',
                        'mo.sec_id'
                    )
                    ->first();
            }

            $collection = collect($students);
            $student = $collection->unique()->values()->all();




            $courseVideos = Vimeo::request('/me/videos', array(), 'GET');

            $courseVideosData = $courseVideos['body']['data'];

            return view('courses', compact('student', 'courseVideosData'));
            //            return view('courses', ['courseVideos' => $courseVideos['body']['data']]);
            //            return view('courses', ['courseVideos' => $courseVideos]);
            //            }else{
            //                 return redirect()->route('teacher');
            //            }
        } else {
            return redirect()->route('route.parent_login');
        }
    }

    public function getCourseVideos($course)
    {

        $stud_id = Auth::user()->stud_id;
        $phone_number = Auth::user()->phone_number;

        $parents = DB::table('master_family')
            ->where('mobile', $phone_number)->get();

        $students = [];

        foreach ($parents as $parent) {
            $students[] = DB::table('master_students as ms')
                ->leftjoin('master_official as mo', 'ms.id', '=', 'mo.stud_id')
                ->leftjoin('master_standard as mst', 'mo.class_id', '=', 'mst.id')
                ->leftjoin('master_section as msc', 'mo.sec_id', '=', 'msc.id')
                ->where('ms.id', $parent->stud_id)
                ->where('mo.stud_id', $parent->stud_id)
                ->select(
                    'ms.admn_no',
                    'ms.first_name',
                    'ms.last_name',
                    'ms.dob',
                    'ms.gender',
                    'mst.standard',
                    'msc.section',
                    'mo.emis',
                    'mo.doa',
                    'mo.class_id',
                    'mo.sec_id'
                )
                ->first();
        }

        $collection = collect($students);
        $student = $collection->unique()->values()->all();

        $courseVideos = Vimeo::request('/me/videos?per_page=100', array(), 'GET');

        $courseVideosData = $courseVideos['body']['data'];

        return view('course-videos', compact('student', 'course', 'courseVideosData'));
    }

    public function getCourseVideosForTeacher()
    {
        $teacher_id = Auth::user()->stud_id;
        $phone_number = Auth::user()->phone_number;

        $teacher = DB::table('master_employee')
            ->where('id', $teacher_id)
            ->where('mobile', $phone_number)
            ->get()->first();

            
        $courseStandards =  DB::table('master_standard')
        ->get()->all();

        $courseSubjects =  DB::table('course_subjects')
            ->get()->all();
        $courseLessons =  DB::table('course_lessons')
            ->get()->all();
        $courseSections =  DB::table('course_sections')
            ->get()->all();
        $courseTitles =  DB::table('course_titles')
            ->get()->all();


        $courseVideos = Vimeo::request('/me/videos?per_page=100', array(), 'GET');

        $courseVideosData = $courseVideos['body']['data'];

        return view('map-video', compact('teacher', 'courseVideosData', 'courseSubjects','courseLessons','courseSections','courseTitles','courseStandards'));
    }
}
