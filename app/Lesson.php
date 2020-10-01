<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
         'title','course_id','video','duration',
  ];

  public function course()
  {
  	return $this->belongsTo('App\Course');
  }
}
