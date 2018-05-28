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

        $admin->givePermissionTo($manageRoles);
    }
}