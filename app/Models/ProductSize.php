<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_id', 'size'];
    protected $table = 'product_sizes';
    public function productSize()
    {
        return $this->belongsTo(product::class, "product_id");
    }
    public function productColorSize()
    {
        return $this->hasMany(ProductColorSize::class);
    }
}
