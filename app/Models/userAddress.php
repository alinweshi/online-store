<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{
    use HasFactory;
    protected $fillable=[	'user_adress',	'country'	,'state'	,'user_id',	'name',	'email',	'phone'	,'surname'];
    protected $tableName='user_address';
    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
