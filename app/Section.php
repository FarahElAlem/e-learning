<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['description', 'title','order','course_id','section_id'];
    protected $hidden = ['created_at','updated_at'];

    public function quiz()
    {
        return $this->hasOne('App\Quiz');
    }

    public function video()
    {
        return $this->hasOne('App\Video');
    }

    public function content()
    {
      return   $this->hasOne('App\Content');
    }

    public function section()
    {
      return $this->hasMany('App\Section','section_id');
    }

    public function sectionChild()
    {
      return $this->section()->with('sectionChild');
    }
}
