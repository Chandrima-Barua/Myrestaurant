<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
   
   protected $fillable = [
      'restaurant_name','address','categories',

   ];

 public function user() {
        return $this->belongsTo('App\User');
    }

    public function categories(){
    	 return $this->belongsTo('App\Category');
    }
 
}
