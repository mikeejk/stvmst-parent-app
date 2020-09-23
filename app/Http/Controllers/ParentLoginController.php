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

class ParentLoginController extends Controller {

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function validateParent($request) {
        $rules = [
            'parent_mobile' => 'required|numeric|digits:10'
        ];

        $message = [
            'required' => 'Please Enter Your Phone Number'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function parentLogin(Request $request) {

        self::validateParent($request);

        $user = User::where('phone_number', '=', $request->parent_mobile)
                        ->where('password', '!=', null)
                        ->where('otp_code', '=', null)
                        ->get()->first();


        if ($user === null) {
            $parent = DB::table('master_family')
                            ->where('mobile', $request->parent_mobile)->first();

            if (!$parent) {
                return redirect()->back()->withErrors(['incorrect_phone_number' => 'Your mobile number is not registered with school.']);
            } else {
                $student = DB::table('master_students')
                                ->where('id', $parent->stud_id)->first();
                $otpStatus = $this->sendOtp($request->parent_mobile);

                if ($otpStatus) {
                    User::updateOrCreate(
                            ['name' => $student->first_name],
                            ['phone_number' => request('parent_mobile'), 'isVerified' => false, 'stud_id' => $parent->stud_id, 'otp_code' => md5($this->otp)]
                    );
                }

                Cookie::queue(Cookie::make('phone_number', request('parent_mobile'), $minutes = '5'));
                return redirect()->route('route.parent_verify')->with(['phone_number' => $request->parent_mobile]);
            }
        } else {
            Cookie::queue(Cookie::make('phone_number', request('parent_mobile'), $minutes = '5'));
            return redirect()->route('route.authenticate')->with(['phone_number' => $request->parent_mobile]);
        }
    }

    protected function sendOtp($phone_number) {
        $this->otp = rand(10000, 99999);
        Log::info("otp = " . $this->otp);

        $Textlocal = new Textlocal();
        $message = "Welcome to St.Vincent Matriculation Higher Secondary School. Your OTP for parent login is   $this->otp";
        $mobile_no = floatval($phone_number);
        $response = $Textlocal->send($message, $mobile_no);

        if ($response->status === 'success') {
            return true;
        }
    }

}
