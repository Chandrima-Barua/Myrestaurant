<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerComment extends Model
{
     public function customers()
    {
       return $this->belongsTo('App\Customer');
    }

    public function customer_post()
    {
       return $this->belongsTo('App\CustomerPost');
    }
}
