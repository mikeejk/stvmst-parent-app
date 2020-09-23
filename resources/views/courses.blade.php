@extends('layouts.auth')

@section('content')






@foreach($student as $stud)
    @foreach($courseVideosData as $video)
        @if($stud->standard === $video['description'])
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> {{ $video['parent_folder']['name'] }}</h5>

                    <a class="card-link" href="/course-videos/{{$video['parent_folder']['name']}}">Click to see all  {{ $video['parent_folder']['name'] }} videos.</a>
                </div>
            </div>
                
        @endif
    @endforeach 
@endforeach



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



