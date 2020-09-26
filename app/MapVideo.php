<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapVideo extends Model
{
    //

    protected $fillable = [
        'standard_id','subject_id','lesson_id','section_id','title_id','video_id'
    ];
}
