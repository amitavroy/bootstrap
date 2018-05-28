<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Amitav Roy',
            'email' => 'reachme@amitavroy.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole(bs_config('administrator'));

        $user = \App\User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon.doe@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole(bs_config('authenticated'));
    }
}
