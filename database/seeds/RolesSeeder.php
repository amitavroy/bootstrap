<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create(['name' => bs_config('administrator')]);
        \Spatie\Permission\Models\Role::create(['name' => bs_config('authenticated')]);
    }
}
