<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = ['name','description'];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function sections()
    {
      return $this->hasMany('App\Section');
    }
}
