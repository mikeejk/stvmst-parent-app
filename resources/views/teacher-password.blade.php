@extends('layouts.guest')

@section('content')


<div class="kt-grid__item  kt-grid kt-grid--ver  kt-grid__item--fluid">

    <!--begin::Body-->
    <div class="kt-login-v1__body">

        <!--begin::Section-->
        <div class="kt-login-v1__section">
            <div class="kt-login-v1__info text-center">
               
                <h3 class="kt-login-v1__intro">Demo School</h3>
                <p></p>
            </div>
        </div>

        <!--begin::Section-->

        <!--begin::Separator-->
        <div class="kt-login-v1__seaprator"></div>

        <!--end::Separator-->

        <!--begin::Wrapper-->
        <div class="kt-login-v1__wrapper">
            <div class="kt-login-v1__container">
                <h3 class="kt-login-v1__title">
                    Your OTP Verification is Successful.</h3>
                <h4 class="text-white text-center">
                    Please Set Password for Teacher Login
                </h4>

                <!--begin::Form-->
                <form action="{{route('users.teacher_password')}}" method="post" class="kt-login-v1__form kt-form" autocomplete="off" id="kt_password_form">
                    @csrf      

                    
            
                    
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Enter Password" name="teacher_password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Re - Enter Password" name="teacher_password_confirmation" autocomplete="off">
                    </div>
                    @error('teacher_password')
                    <div class="form-group text-right">
                        <div class=" kt-font-danger kt-font-bolder">{{ $message }}</div>
                    </div>
                    @enderror

                    @error('invalid_session')
                    <div class="form-group text-right">
                        <div class="kt-font-danger kt-font-bolder">{{ $message }}</div>
                    </div>
                    @enderror

                    <div class="kt-login-v1__actions">
                        <button type="submit" class="btn btn-pill btn-elevate" id="kt_login_submit">Submit</button>
                    </div>
                </form>

                <!--end::Form-->

            </div>
        </div>

        <!--end::Wrapper-->
    </div>

    <!--begin::Body-->
</div>

@endsection

@push('styles')
<link href="{{ asset('css/login-v1.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/login-v1.js') }}"></script>
@endpush