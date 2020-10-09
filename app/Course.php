<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
         'title','category_id','price','photo','lecture','level_id',
  ];

  public function category()
  {
  	return $this->belongsTo('App\Category');
  }

  public function level()
  {
  	return $this->belongsTo('App\Level');
  }

  public function lesson(){
      return $this->hasMany('App\Lesson');
    }

  public function users(){
      return $this->belongsToMany('App\User' , 'enrolls','user_id','course_id')
                  ->withPivot('enroll_date')
                  ->withTimestamps();
    }  


}
