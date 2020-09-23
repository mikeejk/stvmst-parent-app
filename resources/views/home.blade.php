@extends('layouts.auth')

@section('content')



@foreach($student as $stud)
<div class="kt-portlet  kt-widget-14">
    <div class="kt-portlet__body">
        <div class="kt-widget-14__body kt-margin-b-100">

            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Student Name
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{ ($stud->first_name || $stud->last_name)?$stud->first_name .' '. $stud->last_name : '---'}}
                    </div>
                </div>

            </div>

            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Class
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{$stud->standard}}
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Section
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{$stud->section}}
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Gender
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{$stud->gender}}
                    </div>
                </div>

            </div>



        </div>

        <div class="kt-widget-14__body kt-margin-b-100">
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Admission No.
                    </h3>
                    <div class="kt-widget-14__desc">
                        {{ $stud->admn_no}}
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Emis No.
                    </h3>
                    <div class="kt-widget-14__desc">
                        @isset($stud->emis)
                        {{ $stud->emis}}
                        @endisset
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Admission Date
                    </h3>
                    <div class="kt-widget-14__desc">
                        @isset($stud->doa)
                        @if($stud->doa !== '1970-01-01')
                        {{ date('d-m-Y', strtotime($stud->doa))}}
                        @endif
                        @endisset
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        DOB
                    </h3>
                    <div class="kt-widget-14__desc">
                        @isset($stud->dob)
                        {{date('d-m-Y', strtotime($stud->dob))}}
                        @endisset
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endforeach


<div class="kt-portlet  kt-widget-14">
    <div class="kt-portlet__body">

        <div class="kt-widget-14__body kt-margin-b-100">

            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Father Name
                    </h3>
                    <div class="kt-widget-14__desc">
                        @foreach($family as $fam)
                        @if($fam->role === 'f')
                        {{ ($fam->first_name || $fam->last_name)?$fam->first_name .' '. $fam->last_name : '---'}}
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Father Mobile
                    </h3>
                    <div class="kt-widget-14__desc">
                        @foreach($family as $fam)
                        @if($fam->role === 'f')
                        {{ ($fam->mobile)?$fam->mobile : '---'}}
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Mother Name
                    </h3>
                    <div class="kt-widget-14__desc">
                        @foreach($family as $fam)
                        @if($fam->role === 'm')
                        {{ ($fam->first_name || $fam->last_name)?$fam->first_name .' '. $fam->last_name : '---'}}
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="kt-widget-14__product">
                <div class="kt-widget-14__content">
                    <h3 class="kt-widget-14__title">
                        Mother Mobile
                    </h3>
                    <div class="kt-widget-14__desc">
                        @foreach($family as $fam)
                        @if($fam->role === 'm')
                        {{ ($fam->mobile) ? $fam->mobile : '---'}}
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
