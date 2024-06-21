<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Shop Keeper',
            'email' => 'keeper@shop.com',
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $admin->assignRole($adminRole);
    }
}
