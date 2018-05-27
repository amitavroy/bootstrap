<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_gets_default_role_on_registration()
    {
        $this->artisan('db:seed');

        $data = [
            'name' => 'Amitav Roy',
            'email' => 'amitavroy@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->post('register', $data)->assertRedirect('/home');

        $user = User::where('email', 'amitavroy@gmail.com')->first();

        $this->assertTrue($user->hasRole(bs_config('authenticated')));
    }
}
