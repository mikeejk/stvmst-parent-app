@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="alert alert-success" style="display:none"></div>
    <form  enctype="multipart/form-data" id="videoUpload" action="javascript:void(0)">

        @csrf
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" id="videoTitle" name="videoTitle">
        </div>         
        <div class="form-group">
            <label for="name">Description:</label>
            <textarea class="form-control" id="videoDesc" name="videoDesc"></textarea>
            
        </div>         
        <div class="form-group">
            <label for="name">Select Video to Upload:</label>
            <input type="file" class="form-control"  id="videoFile" name="videoFile">
        </div>         

        <input type="submit" value="Submit">
    </form>
</div>


<div id='loading' style="position:absolute;top:5%;left:30%;width:15%;display:none">
    <img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>
</div>
@endsection

@push('scripts')

<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#videoUpload').submit(function (e) {
            e.preventDefault();

            $('#loading').show();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('save-video')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#loading').hide();
                    console.log(data);
                    this.reset();
                    alert('Video has been uploaded successfully');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });

</script>
<!--<script type="text/javascript" src="{{ asset('js/video-upload.js') }}"></script>-->
@endpush



