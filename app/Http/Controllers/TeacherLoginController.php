<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Rahulreghunath\Textlocal\Textlocal;
use Tzsk\Sms\Facade\Sms;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class TeacherLoginController extends Controller {

    //

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function validateTeacher($request) {
        $rules = [
            'teacher_mobile' => 'required|numeric|digits:10'
        ];

        $message = [
            'required' => 'Please Enter Your Phone Number Teacher'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function teacherLogin(Request $request) {

        self::validateTeacher($request);

        $user = User::where('phone_number', '=', $request->teacher_mobile)
                        ->where('password', '!=', null)
                        ->where('otp_code', '=', null)
                        ->where('role', '!=', 'stud')
                        ->get()->first();


        if ($user === null) {
            $teacher = DB::table('master_employee')
                            ->where('mobile', $request->teacher_mobile)->first();

            if (!$teacher) {
                return redirect()->back()->withErrors(['incorrect_phone_number' => 'Your mobile number is not registered with school.']);
            } else {

                $otpStatus = $this->sendOtp($request->teacher_mobile);

                if ($otpStatus) {
                    User::updateOrCreate(
                            ['name' => $teacher->first_name],
                            ['phone_number' => request('teacher_mobile'), 'isVerified' => false, 'stud_id' => $teacher->id, 'otp_code' => md5($this->otp),'role' => 'emp']
                    );
                }

                Cookie::queue(Cookie::make('phone_number', request('teacher_mobile'), $minutes = '5'));
                return redirect()->route('route.teacher_verify')->with(['phone_number' => $request->teacher_mobile]);
            }
        } else {
            Cookie::queue(Cookie::make('phone_number', request('teacher_mobile'), $minutes = '5'));
            return redirect()->route('route.teacher_authenticate')->with(['phone_number' => $request->teacher_mobile]);
        }
    }

    protected function sendOtp($phone_number) {
        $this->otp = rand(10000, 99999);
        Log::info("otp = " . $this->otp);

        $Textlocal = new Textlocal();
        $message = "Welcome to Demo School. Your OTP for teacher login is   $this->otp";
        $mobile_no = floatval($phone_number);
        $response = $Textlocal->send($message, $mobile_no);

        if ($response->status === 'success') {
            return true;
        }
    }

}
