<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['question'];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
