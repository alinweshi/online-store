<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=['name'	,'mail',	'phone_number'	,'description'	,'logo',	'favion',	'facebook'	,
    'instgram',	'twitter'	,'tiktok',	'youtube',	'google'	,'location'];
    protected $table="settings";
}
