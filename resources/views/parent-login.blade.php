@extends('layouts.guest')

@section('content')



<div class="kt-grid__item  kt-grid kt-grid--ver  kt-grid__item--fluid">

    <!--begin::Body-->
    <div class="kt-login-v1__body">

        <!--begin::Section-->
        <div class="kt-login-v1__section">
            <div class="kt-login-v1__info text-center">
                <a href="http://www.stvincentschooltrichy.com/" target="_blank">                    
                    <img src="{{asset('images/vincent-logo.jpg')}}" alt="School Logo" title="School Logo" />
                </a>
                <h3 class="kt-login-v1__intro">St.Vincent Matriculation Higher Secondary School</h3>
                <p>Trichy - 27</p>
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
                    Parent Login
                </h3>

                <!--begin::Form-->


                <form action="{{ route('users.parent_login')}}" method="post" class="kt-login-v1__form kt-form" autocomplete="off" id="kt_login_form">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Phone Number" name="parent_mobile" autocomplete="off">
                    </div>


                    @if ($errors->has('parent_mobile'))
                    <div class="form-group text-right">
                        <div class=" kt-font-danger kt-font-bolder">{{ $errors->first('parent_mobile') }}</div>
                    </div>
                    @enderror

                    @error('incorrect_phone_number')
                    <div class="form-group text-right">
                        <div class=" kt-font-danger kt-font-bolder">{{ $message }}</div>
                    </div>
                    @enderror

                    <div class="kt-login-v1__actions">
                        <button type="submit" class="btn btn-pill btn-elevate" id="kt_login_submit">Sign In</button>
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