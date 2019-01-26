<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerPost extends Model
{
     protected $fillable = [
            'name',
            //'subject',
            'body',
            
	    
        ];

    public function customers() {
        return $this->belongsTo('App\Customer');
    }

    public function comments() {
        return $this->hasMany('App\CustomerComment');
    }
}
