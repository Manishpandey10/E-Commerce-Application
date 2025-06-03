<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productdata extends Model
{
    protected $table = "productdata";
    protected $primaryKey = "id"; 
    protected $fillable = [
        'productname',
        'productdescription',
        'productthumbnail',
        'metaTitle',
        'metaDescription','productStatus'
    ];



    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function theme(){
        return $this->belongsTo(Theme::class, 'theme_id');
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}   
