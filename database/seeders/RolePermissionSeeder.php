<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage clients']);
        Permission::create(['name' => 'manage tickets']);
        Permission::create(['name' => 'manage roles']);

        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);

        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'manage clients',
            'manage tickets'
        ]);
    }
}