<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
        $user = Admin::create([
            'name' => 'ali nweshi',
            'email' => 'alinweshi1@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

    }
}
