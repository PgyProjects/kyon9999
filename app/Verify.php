<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    //
//    protected $timestamps = false;

    protected $primaryKey = 'customer_id';

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
