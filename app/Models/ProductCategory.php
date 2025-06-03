<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductCategory extends Model
{

    use HasFactory, Notifiable;
    
    protected $table = "products_category";
    protected $primaryKey = "id"; 

    protected $fillable = [
        'categoryname',
        'email',
        'password',
        'phone',
        'thumbnail','metaTitle','metaDescription','productStatus'
    ];
    public function products(){
        return $this->hasMany(Productdata::class , 'category_id');
    }
}
