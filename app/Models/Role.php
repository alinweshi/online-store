<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Role extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    public $guarded = [];
    protected $fillable = ['name', 'guard_name'];
    public function admins()
    {
        $this->belongsToMany(Admin::class, 'admin_role', 'role_id', 'admin_id');
    }
}
