<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SystemPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', bs_config('administrator'))->first();
        $manageRoles = Permission::create(['name' => 'manage roles']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        $managePermissions = Permission::create(['name' => 'manage permissions']);
        $manageSettings = Permission::create(['name' => 'manage settings']);

        $admin->givePermissionTo($manageRoles);
        $admin->givePermissionTo($manageUsers);
        $admin->givePermissionTo($manageSettings);
        $admin->givePermissionTo($managePermissions);
    }
}
