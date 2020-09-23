@extends('layouts.auth')

@section('content')

<div class="kt-portlet  kt-widget-14">
    <div class="kt-portlet__body">
        <div class="kt-widget-14__body kt-margin-b-100">
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Employee Name
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{ ($teacher->first_name || $teacher->last_name)?$teacher->first_name .' '. $teacher->last_name : '---'}}
                    </div>
                </div>
            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Gender
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{$teacher->gender}}
                    </div>
                </div>
            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Mobile
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{$teacher->mobile}}
                    </div>
                </div>
            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        DOB
                    </h3>
                    <div class="kt-widget-14__desc">
                        @isset($teacher->dob)
                        {{date('d-m-Y', strtotime($teacher->dob))}}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
