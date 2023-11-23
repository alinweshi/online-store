<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id','color_id'];
    protected $table= 'product_colors';
    public function ProductColorSize(){
        return $this->hasmany(ProductColorSize::class);
    }

}
