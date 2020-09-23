<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class TeacherVerifyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateTeacherOtp($request) {

        $rules = [
            'teacher_otp' => 'required|numeric|digits:5'
        ];

        $message = [
            'required' => 'Please Enter OTP.'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function teacherVerify(Request $request) {

        $isValidated = self::validateTeacherOtp($request);


        $teacherOtp = md5($request->teacher_otp);

        $teacher = User::where('otp_code', '=', $teacherOtp)
                        ->where('phone_number', '=', $request->cookie('phone_number'))
                        ->where('role', '=', 'emp')
                        ->get()->first();
        
        if (!$teacher) {
            return redirect()->back()->withErrors(['incorrect_otp' => 'Incorrect OTP. Please try again!']);
        } else {
            return redirect()->route('route.teacher_password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
