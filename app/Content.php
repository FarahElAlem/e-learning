<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  protected $table = 'contents';
    protected $fillable = ['article','section_id'];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
