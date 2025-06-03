<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangePolicy extends Model
{
     protected $table = "exchange_return";
    protected $primaryKey = 'id';
    protected $fillable = [
        'exchange_policy'
    ];
}
