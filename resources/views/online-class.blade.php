@extends('layouts.auth')

@section('content')

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Online Classes Schedule</h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Please click on Join Meeting Button to Join any Meeting.
            </div>
            <div class="kt-section__content">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>

                            <th>Date</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Meeting</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($onlineClass as $key => $oc)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{ date('d-m-Y', strtotime($oc->oc_date))}}</td>
                            <td>{{ $oc->standard}}</td>
                            <td>{{ $oc->section}}</td>
                            <td>{{ $oc->subject}}</td>
                            <td>{{ $oc->first_name.' '. $oc->last_name}}</td>
                            <td>{{ $oc->oc_start_time}}</td>
                            <td>{{ $oc->oc_end_time}}</td>
                            <td><a href="//{{ $oc->oc_meeting_id}}" target="_blank" class="btn btn-lg btn-success">Join Meeting</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <!--end::Section-->
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

    </div>
</div>

@endsection
