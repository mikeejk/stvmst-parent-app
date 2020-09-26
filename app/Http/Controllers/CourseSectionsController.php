<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSection;

class CourseSectionsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateSection($request)
    {

        $rules = [
            'new_section' => 'required'
        ];

        $message = [
            'required' => 'Please Enter a Section'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function save(Request $request)
    {

        $this->validateSection($request);

        $add_section = CourseSection::Create(
            ['section' => request('new_section')],
        );
        if ($add_section) {
            return response()->json(['success' => 'Section Added Successfully.']);
        } else {
            return response()->json(['failure' => 'Section Not Added']);
        }
    }
}
