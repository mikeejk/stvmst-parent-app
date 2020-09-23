<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TeacherPasswordController extends Controller {

    //


    public function validateTeacherPassword($request) {
        $rules = [
            'teacher_password' => 'required|string|min:6|confirmed',
            'teacher_password_confirmation' => 'required',
        ];

        $message = [
            'required' => 'Please Enter Password'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function TeacherPassword(Request $request) {

        self::validateTeacherPassword($request);

        $password = Hash::make($request->get('teacher_password'));

        $teacher = User::where('phone_number', '=', $request->cookie('phone_number'))
                        ->where('role', '=', 'emp')
                        ->get()->first();

        if (!$teacher) {
            return redirect()->back()->withErrors(['invalid_session' => 'Something Went Wrong. Please try again!']);
        } else {
            $teacher->update(['password' => $password]);
            $teacher->update(['otp_code' => null]);
            $teacher->update(['isVerified' => true]);
            if (Auth::loginUsingId($teacher->id)) {
                return redirect()->route('teacher');
            } else {
                return $teacher;
            }
        }
    }

    public function authenticateTeacherPassword($request) {
        $rules = [
            'auth_password' => 'required|string'
        ];

        $message = [
            'required' => 'Please Enter Password'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function teacherAuthenticate(Request $request) {

        self::authenticateTeacherPassword($request);

        $teacher = User::where('phone_number', '=', $request->cookie('phone_number'))
                        ->where('role', '=', 'emp')
                        ->get()->first();
        if (!$teacher) {
            return redirect()->back()->withErrors(['invalid_session' => 'Something Went Wrong. Please try again!']);
        } else {
            if (Hash::check($request->auth_password, $teacher->password)) {
                if (Auth::loginUsingId($teacher->id)) {
                    return redirect()->route('teacher');
                } else {
                    return $teacher;
                }
            } else {
                return redirect()->back()->withErrors(['incorrect_password' => 'Password is Incorrect.']);
            }
        }
    }

}
