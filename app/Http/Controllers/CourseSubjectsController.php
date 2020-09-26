<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CourseSubject;

class CourseSubjectsController extends Controller
{

    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateSubject($request)
    {

        $rules = [
            'new_subject' => 'required'
        ];

        $message = [
            'required' => 'Please Enter a Subject'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function save(Request $request)
    {

        $this->validateSubject($request);

        $add_subject = CourseSubject::Create(
            ['subject' => request('new_subject')],
        );
        if ($add_subject) {
            return response()->json(['success' => 'Subject Added Successfully.']);
        } else {
            return response()->json(['failure' => 'Subject Not Added']);
        }
    }

 


}
