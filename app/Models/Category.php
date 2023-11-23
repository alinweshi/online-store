<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name", "image", "parent_id",
    ];
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id'); //category can have multiple categories inside it
    }
    public function parent()
    {
        return $this->belongsto(Category::class, 'parent_id'); //category can have multiple categories inside it
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id'); //category can have multiple products inside it
    }
}
