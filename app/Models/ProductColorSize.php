<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;
    protected  $fillable=['product_size_id',	'product_color_id',	'quantity',	'sub_price'	,'discount_price'	,'status'];
    protected $table = ['product_color_sizes'];
    public function ProductColor(){
        return $this->belongsto(ProductColor::class,'product_color_id');
    }
    public function ProductSize(){
return $this->belongsto(ProductSize::class,'product_size_id');
}
}