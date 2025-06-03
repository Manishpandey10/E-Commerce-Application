<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'themes';
    protected $primaryKey = 'id';

    public function products(){
        return $this->hasMany(Productdata::class , 'theme_id');
    }
}
