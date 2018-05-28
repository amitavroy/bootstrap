<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_user_with_manage_roles_permission_should_see_the_listing_page()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function user_should_see_list_of_roles()
    {
        $user = factory(User::class)->create();
        $role = factory(Role::class)->create();
        factory(Role::class, 10)->create(['name' => 'First role']);
        factory(Role::class)->create(['name' => 'Some random role']);

        $this->actingAs($user)
            ->get(route('roles.index'))
            ->assertStatus(200)
            ->assertSeeText('Roles')
            ->assertSeeText('First role')
            ->assertDontSeeText('Some random role');
    }

    /** @test */
    public function a_user_with_managed_role_permission_should_see_create_role_page()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function user_should_be_able_to_create_role()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function role_name_is_required_while_creating_role()
    {
        $this->assertTrue(false);
    }
}
