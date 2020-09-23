@extends('layouts.auth')

@section('content')

{{--dd($courseVideosData)--}}
{{--dd($teacher)--}}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Map Video</h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>class:</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option value=''>L.K.G</option>
                                    <option value=''>U.K.G</option>
                                    <option value=''>I</option>
                                    <option value=''>II</option>
                                    <option value=''>III</option>
                                </select>                    
                            </div>
                            <div class="form-group">
                                <label>Subject:</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option value=''>Tamil</option>
                                    <option value=''>English</option>
                                    <option value=''>Maths</option>
                                    <option value=''>EVM</option>
                                    <option value=''>Social</option>
                                </select>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-brand" data-toggle="modal" data-target="#subjectModal">
                                    New Subject
                                </button>                                


                            </div>
                            <div class="form-group">
                                <label>Lesson :</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option value=''>Geometry</option>
                                    <option value=''>Numbers</option>
                                    <option value=''>Patterns</option>
                                    <option value=''>Information Processing</option>                        
                                </select> 
                            </div>

                            <div class="form-group">
                                <label>Section :</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option value=''>Comparisons</option>
                                    <option value=''>Shapes</option>                                              
                                </select> 
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


            <!-- Modal -->
            <div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="subjectModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subjectModalLabel">New Subject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form id="newSubject" action="javascript:void(0)"  enctype="multipart/form-data">                                                
                                @csrf
                                <div class="form-group">
                                    <label for="name">Subject:</label>
                                    <input type="text" class="form-control"  name="new_subject">
                                </div>                                                                                                                                

                                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-brand" value='Save changes'>                                   

                                <div class="alert d-none mt-5 sm-flex" role="alert" id="message">
                                    <div class="alert-text"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">All Videos</h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-scroll-x="true" style="height: 500px">
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
<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#newSubject').submit(function (e) {
            e.preventDefault();


            $('#loading').show();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "/new-subject",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: (data) => {
                    $('#loading').hide();
                    console.log(data);
                    this.reset();
                    $('#message').removeClass('d-none').addClass('alert-success').html(data.success).fadeIn();
                },
                error: function (err) {
                    console.log(err);
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#message').removeClass('d-none').addClass('alert-warning').html(err.responseJSON.message).fadeIn();
                    }

                }
            });
        });
    });


    $(document).on('show.bs.modal', '#subjectModal', function () {
        alert('hi');
    })


</script>
@endpush



