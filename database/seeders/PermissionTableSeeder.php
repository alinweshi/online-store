<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
        $permissions = [
            'users',
            'show user',
            'add user',
            'edit user',
            'delete user',

            'categories',
            'show category',
            'add category',
            'edit category',
            'delete category',

            'products',
            'show product',
            'add product',
            'edit product',
            'delete product',

            'orders',
            'show order',
            'add order',
            'edit order',
            'delete order',

            'settings',
            'show setting',
            'add setting',
            'edit setting',
            'delete setting',

            'invoices',
            'show invoice',
            'add invoice',
            'edit invoice',
            'delete invoice',
            'invoice_items',
            'export as excel',
            'payment status',

            'permissions',
            'show permission',
            'add permission',
            'edit permission',
            'update permission',
            'delete permission',

            'roles',
            'show role',
            'add role',
            'edit role',
            'delete role',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}



