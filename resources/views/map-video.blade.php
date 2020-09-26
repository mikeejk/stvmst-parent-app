@extends('layouts.auth')

@section('content')

{{--dd($courseVideosData)--}}
{{--dd($teacher)--}}
{{-- dd($courseSubjects) --}}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-5">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Map Video</h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form" id="newCourseVideo" action="javascript:void(0)"  enctype="multipart/form-data" >
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>class:</label>
                                <select class="form-control{{ $errors->has('standard') ? ' is-invalid' : '' }}" name="standardDD">
                                    @foreach($courseStandards as $standard)
                                    <option value="{{ $standard->id }}">{{ $standard->standard }}</option>
                                    @endforeach
                                  </select>
                      
                                  @if ($errors->has('standardDD'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('standardDD') }}</strong>
                                      </span>
                                  @endif                   
                            </div>
                            <div class="form-group">

                                <label>Subject:</label>

                                <select class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subjectDD">
                                    @foreach($courseSubjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                    @endforeach
                                  </select>
                      
                                  @if ($errors->has('subjectDD'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('subjectDD') }}</strong>
                                      </span>
                                  @endif

                                <!-- New Subject modal -->
                                <button type="button" class="btn btn-outline-brand" data-toggle="modal" data-target="#subjectModal">
                                    New Subject
                                </button>                                


                            </div>
                            <div class="form-group">
                                <label>Lesson :</label>
                               
                                <select class="form-control{{ $errors->has('lesson') ? ' is-invalid' : '' }}" name="lessonDD">
                                    @foreach($courseLessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->lesson }}</option>
                                    @endforeach
                                  </select>
                      
                                  @if ($errors->has('lessonDD'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('lessonDD') }}</strong>
                                      </span>
                                  @endif

                                  <!-- New Lesson modal -->
                                  <button type="button" class="btn btn-outline-brand" data-toggle="modal" data-target="#lessonModal">
                                    New Lesson
                                </button>              
                            </div>

                            <div class="form-group">
                                <label>Section :</label>
                                <select class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}" name="sectionDD">
                                    @foreach($courseSections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section }}</option>
                                    @endforeach
                                  </select>
                      
                                  @if ($errors->has('sectionDD'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('sectionDD') }}</strong>
                                      </span>
                                  @endif

                                 <!-- New Section modal -->
                                 <button type="button" class="btn btn-outline-brand" data-toggle="modal" data-target="#sectionModal">
                                    New Section
                                </button>     
                            </div>


                            <div class="form-group">
                                <label>Title :</label>
                                <select class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="titleDD">
                                    @foreach($courseTitles as $title)
                                    <option value="{{ $title->id }}">{{ $title->title }}</option>
                                    @endforeach
                                  </select>
                      
                                  @if ($errors->has('titleDD'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('titleDD') }}</strong>
                                      </span>
                                  @endif

                                 <!-- New Title modal -->
                                 <button type="button" class="btn btn-outline-brand" data-toggle="modal" data-target="#titleModal">
                                    New Title
                                </button>     
                            </div>

                            <div class="form-group">
                                <label>Video URL:</label>
                                <input type="text" class="form-control" placeholder="Enter Video URL" />                    
                            </div>

                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>                
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
            @include('modals.subject-modal')
            @include('modals.lesson-modal')
            @include('modals.section-modal')
            @include('modals.title-modal')

        </div>

        <div class="col-lg-7">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">All Videos</h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-scroll-x="true" style="height: 600px">
                        <div style="width: 100%;">

                            <table class="table table-bordered">
                                <tr>
                                    <th>S.No</th>
                                    <th>Video</th>
                                    <th>Subject</th>
                                    <th>Video Id</th>
                                </tr>
                                @foreach($courseVideosData as $key=>$video)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td> 
                                        <p><strong>Title:</strong> {{$video['name']}} <strong>Class:</strong> {{$video['description']}}<p>
                                        <div class='embed-container'>              
                                            {!!  $video['embed']['html']  !!}
                                        </div>
                                    </td>
                                    <td> {{$video['parent_folder']['name']}}</td>
                                    <td>{{$video['uri']}}</td>
                                </tr>


                                @endforeach 


                            </table>
                        </div>
                    </div>

                </div>


            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>






@endsection

@push('styles')
<style>
    .embed-container { 
        position: relative; 
        padding-bottom: 56.25%; 
        height: 0; overflow: hidden; 
        max-width: 100%; 
    } 

    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { 
        position: absolute; 
        top: 0; left: 0; 
        width: 100%; 
        height: 100%; 
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/c-subject.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/c-lesson.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/c-section.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/c-title.js') }}"></script>
<script type="text/javascript">
$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#newCourseVideo').submit(function (e) {
        e.preventDefault();


        $('#loading').show();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "/new-lesson",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: (data) => {
                $('#loading').hide();
                console.log(data);
                this.reset();
                $('#lessonMessage').removeClass('d-none').addClass('alert-success').html(data.success).fadeIn();
            },
            error: function (err) {
                console.log(err);
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    console.log(err.responseJSON);
                    $('#lessonMessage').removeClass('d-none').addClass('alert-warning').html(err.responseJSON.message).fadeIn();
                }

            }
        });
    });
});  
</script>
@endpush



