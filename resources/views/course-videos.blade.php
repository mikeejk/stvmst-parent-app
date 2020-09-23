@extends('layouts.auth')

@section('content')





@foreach($student as $stud)
    @foreach($courseVideosData as $video)
        @if($stud->standard === $video['description'])
            @if($course === $video['parent_folder']['name'])
                <div class='embed-container'>              
                      
                           {!!  $video['embed']['html']  !!}
                      
               
                </div>        
            @endif
        @endif
    @endforeach 
@endforeach




<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    var iframe = document.querySelector('iframe');
    var player = new Vimeo.Player(iframe);

    player.on('play', function() {
        console.log('played the video!');
    });

    player.getVideoTitle().then(function(title) {
        console.log('title:', title);
    });
</script>

<style>
    .embed-container {
        --video--width: 1296;
        --video--height: 540;

        position: relative;
        padding-bottom: calc(var(--video--height) / var(--video--width) * 100%); /* 41.66666667% */
        overflow: hidden;
        max-width: 100%;
        background: white;
    }

    .embed-container iframe,
    .embed-container object,
    .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>


@endsection


