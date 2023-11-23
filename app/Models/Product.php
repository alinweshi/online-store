<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
        , 'discount_price',
        'category_id',
        'status',
        'quantity',
    ];
    protected $table = "products";
    public function category()
    {
        return $this->belongsTo(category::class, "category_id");
    }public function Productcolor()
    {
        return $this->hasmany(ProductColor::class, 'product_color_id');
    }
    public function Productsize()
    {
        return $this->hasmany(ProducSize::class, 'product_size_id');
    }
}
