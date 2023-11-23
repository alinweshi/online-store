<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $guard = [];
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'image', 'role', 'status',
    ];
/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
    protected $hidden = [
        'password', 'remember_token', 'role', 'status',
    ];
/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'array',
    ];
    // app/Models/User.php
    public function hasAnyRole($roles)
    {
        return in_array($this->role, $roles);
    }

}
