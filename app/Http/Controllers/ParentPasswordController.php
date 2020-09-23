<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ParentPasswordController extends Controller {

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
    public function validateParentPassword($request) {
        $rules = [
            'parent_password' => 'required|string|min:6|confirmed',
            'parent_password_confirmation' => 'required',
        ];

        $message = [
            'required' => 'Please Enter Password'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function ParentSetPassword(Request $request) {

        self::validateParentPassword($request);

        $password = Hash::make($request->get('parent_password'));

        $parent = User::where('phone_number', '=', $request->cookie('phone_number'))
                        ->get()->first();

        if (!$parent) {
            return redirect()->back()->withErrors(['invalid_session' => 'Something Went Wrong. Please try again!']);
        } else {
            $parent->update(['password' => $password]);
            $parent->update(['otp_code' => null]);
            $parent->update(['isVerified' => true]);
            if (Auth::loginUsingId($parent->id)) {
                return redirect()->route('home');
            } else {
                return $parent;
            }
        }
    }

    public function authenticateParentPassword($request) {
        $rules = [
            'auth_password' => 'required|string'
        ];

        $message = [
            'required' => 'Please Enter Password'
        ];

        return $this->validate($request, $rules, $message);
    }

    public function parentAuthenticate(Request $request) {

        self::authenticateParentPassword($request);

        $parent = User::where('phone_number', '=', $request->cookie('phone_number'))
                        ->get()->first();

        if (!$parent) {
            return redirect()->back()->withErrors(['invalid_session' => 'Something Went Wrong. Please try again!']);
        } else {
            if (Hash::check($request->auth_password, $parent->password)) {
                if (Auth::loginUsingId($parent->id)) {
                    return redirect()->route('home');
                } else {
                    return $parent;
                }
            } else {
                return redirect()->back()->withErrors(['incorrect_password' => 'Password is Incorrect.']);
            }
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
