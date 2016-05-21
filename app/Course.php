<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = ['name','description','about','status'];
    protected $appends = ['section_count','video_duration'];
    public function users()
    {
      return $this->belongsToMany('App\User','course_enrolls');
    }
    public function sections()
    {
      return $this->hasMany('App\Section');
    }

    public function getSectionCountAttribute()
    {
      return $this->sections()->count();
    }

    public function getVideoDurationAttribute()
    {
      $data = 0;
      foreach($this->sections()->get() as $section)
      {
        if($section->video!=null&&$section->status==1){
        $data += $section->video->length;
        }
      }

      return $data;
    }

    public function getStudentCountAttribute()
    {
      return $this->users()->count();
    }
}
