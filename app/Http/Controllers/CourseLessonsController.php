<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CourseLesson;

class CourseLessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateLesson($request)
    {

        $rules = [
            'new_lesson' => 'required'
        ];

        $message = [
            'required' => 'Please Enter a Lesson'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function save(Request $request)
    {

        $this->validateLesson($request);

        $add_lesson = CourseLesson::Create(
            ['lesson' => request('new_lesson')],
        );
        if ($add_lesson) {
            return response()->json(['success' => 'Lesson Added Successfully.']);
        } else {
            return response()->json(['failure' => 'Lesson Not Added']);
        }
    }
}
