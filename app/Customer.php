<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function verify()
    {
        return $this->hasOne('App\Verify');
    }
}
