$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#newLesson').submit(function (e) {
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