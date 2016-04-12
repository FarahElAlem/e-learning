<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['path'];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
