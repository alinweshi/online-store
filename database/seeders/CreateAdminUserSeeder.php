<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUser2Seeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $user = Admin::create([
            'name' => 'ali nweshi',
            'email' => 'alinweshi@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => $role->id,
            'role_name' => $role->name,
        ]);
        $permissions = Permission::where('guard_name', 'admin')->get()->pluck('id')->toArray();
        $role->syncPermissions($permissions);
        $user->assignRole($role->name);
    }
}
