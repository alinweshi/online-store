<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'nickname', 'email', 'status', 'address', 'phone',
        'payment_method', 'payment_status', 'payment_id', 'country', 'country_city', 'square', 'created_at'];
    protected $table = "orders";
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function OrderDetail()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
}
