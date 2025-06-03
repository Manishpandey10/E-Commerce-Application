<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    protected $table = "terms_condition";
    protected $primaryKey = 'id';
    protected $fillable = [
        'exchange_policy'
    ];
}
