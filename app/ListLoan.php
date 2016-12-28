<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListLoan extends Model
{
    protected $fillable = [
        'customer_id', 'user_id', 'amount', 'repayment_date', 'actual_date', 'status', 'category', 'repayment_way', 'remain',
    ];


}
