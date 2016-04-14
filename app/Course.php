<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = ['name','description'];
    protected $appends = ['section_count'];
    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function sections()
    {
      return $this->hasMany('App\Section');
    }

    public function getSectionCountAttribute()
    {
      return $this->sections()->count();
    }
}
