<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OnlineClass;
use DB;
use Illuminate\Support\Facades\Auth;

class OnlineClassController extends Controller {

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

//            if (Auth::user()->role === 'stud') {

                $phone_number = Auth::user()->phone_number;

            $parents = DB::table('master_family')
                            ->where('mobile', $phone_number)->get();
            $onlineClasses = [];            

            foreach ($parents as $parent) {
                $onlineClasses[] = DB::table('master_students as ms')
                        ->leftjoin('master_official as mo', 'ms.id', '=', 'mo.stud_id')
                        ->leftjoin('master_standard as mst', 'mo.class_id', '=', 'mst.id')
                        ->leftjoin('master_section as msc', 'mo.sec_id', '=', 'msc.id')
                        ->leftjoin('master_online_class as moc', 'mo.class_id', '=', 'moc.oc_class_id', 'and', 'mo.sec_id', '=', 'moc.oc_sec_id')
                        ->leftjoin('master_subject_names as msn', 'moc.oc_subject_id', '=', 'msn.id')
                        ->leftjoin('master_employee as me', 'moc.oc_teacher_id', '=', 'me.id')
                        ->where('ms.id', $parent->stud_id)
                        ->where('mo.stud_id', $parent->stud_id)
                        ->where('moc.oc_status', '=', 1)
                        ->select('mst.standard', 'msc.section',                                
                                'moc.oc_meeting_id', 'moc.oc_date', 'moc.oc_start_time', 'moc.oc_end_time', 'moc.oc_status',
                                'msn.subject',
                                'me.first_name', 'me.last_name'
                        )
                        ->get();
            }

            $collection = collect($onlineClasses)->flatten();
            $onlineClass = $collection->unique()->values()->all();
            
//            $online_class = DB::table('master_online_class as moc')
//                            ->leftjoin('master_standard as mst', 'moc.oc_class_id', '=', 'mst.id')
//                            ->leftjoin('master_section as msc', 'moc.oc_sec_id', '=', 'msc.id')
//                            ->leftjoin('master_employee as me', 'moc.oc_teacher_id', '=', 'me.id')
//                            ->leftjoin('master_subject_names as msn', 'moc.oc_subject_id', '=', 'msn.id')
//                            ->where('moc.oc_class_id', '=', $official->class_id)
//                            ->where('moc.oc_sec_id', '=', $official->sec_id)
//                            ->where('moc.oc_status', '=', 1)
//                            ->select('mst.standard', 'msc.section',
//                                    'moc.oc_meeting_id', 'moc.oc_date', 'moc.oc_start_time', 'moc.oc_end_time', 'moc.oc_status',
//                                    'me.first_name', 'me.last_name',
//                                    'msn.subject'
//                            )
//                            ->get()->all();

//            if ($online_class) {
//                $meeting_url = "//$online_class->oc_meeting_id";
//            } else {
//                $meeting_url = null;
//            }
//            return view('online-class', compact('meeting_url', 'online_class'));
                return view('online-class', compact('onlineClass'));
//            }else{
//                 return redirect()->route('teacher');
//            }
        } else {
//            return View::make('login');
            return redirect()->route('route.parent_login');
        }
    }

}
