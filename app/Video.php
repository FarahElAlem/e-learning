<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['path','section_id','length'];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
