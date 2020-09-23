<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (Auth::check()) {

            if (Auth::user()->role === 'emp') {

                $teacher_id = Auth::user()->stud_id;
                $phone_number = Auth::user()->phone_number;

                $teacher = DB::table('master_employee')
                                ->where('id', $teacher_id)
                                ->where('mobile', $phone_number)
                                ->get()->first();
//
//            $students = [];
//
//            foreach ($parents as $parent) {
//                $students[] = DB::table('master_students as ms')
//                        ->leftjoin('master_official as mo', 'ms.id', '=', 'mo.stud_id')
//                        ->leftjoin('master_standard as mst', 'mo.class_id', '=', 'mst.id')
//                        ->leftjoin('master_section as msc', 'mo.sec_id', '=', 'msc.id')
//                        ->where('ms.id', $parent->stud_id)
//                        ->where('mo.stud_id', $parent->stud_id)
//                        ->select('ms.admn_no', 'ms.first_name', 'ms.last_name', 'ms.dob', 'ms.gender',
//                                'mst.standard', 'msc.section',
//                                'mo.emis', 'mo.doa', 'mo.class_id', 'mo.sec_id'
//                        )
//                        ->first();
//            }
//
//            $collection = collect($students);
//            $student = $collection->unique()->values()->all();





                return view('teacher', compact('teacher'));
            } else {
                return redirect()->route('home');
            }
        } else {
//            return View::make('login');
            return redirect()->route('route.teacher_login');
        }
    }

}
