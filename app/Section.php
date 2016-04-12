<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['description', 'title','order','course_id','section_id'];

    public function quiz()
    {
        $this->hasOne('App/Quiz');
    }

    public function video()
    {
        $this->hasOne('App/Video');
    }

    public function content()
    {
        $this->hasOne('App/Content');
    }
}
