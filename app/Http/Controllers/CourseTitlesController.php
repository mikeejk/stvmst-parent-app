<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\courseTitle;

class CourseTitlesController extends Controller
{
    //

     //

     public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function validateTitle($request)
     {
 
         $rules = [
             'new_title' => 'required'
         ];
 
         $message = [
             'required' => 'Please Enter a Title'
         ];
 
         return $this->validate($request, $rules, $message);
     }
 
     public function save(Request $request)
     {
 
         $this->validateTitle($request);
 
         $add_title = CourseTitle::Create(
             ['title' => request('new_title')],
         );
         if ($add_title) {
             return response()->json(['success' => 'Title Added Successfully.']);
         } else {
             return response()->json(['failure' => 'Title Not Added']);
         }
     }
 
}
