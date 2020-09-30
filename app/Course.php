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


}