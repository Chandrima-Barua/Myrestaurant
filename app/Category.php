<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	 protected $fillable = [
      'categories',

   ];
	
    public function owners() {
        return $this->hasMany('App\Owner');
    }
    
}
