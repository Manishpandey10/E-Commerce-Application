<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'id';
    

    public function products()
    {
        return $this->hasMany(Productdata::class, 'color_id');
    }
}
