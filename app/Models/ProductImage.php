<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = ["Product_Color_Size_id", "image"];
    protected $table = "product_image";
    public function  ProductColorSize(){
        return $this->belongsTo(ProductColorSize::class);
    }
}
