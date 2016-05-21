<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizes';
    protected $fillable = ['question'];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function answer()
    {
      return $this->hasMany('App\Answer');
    }
}
