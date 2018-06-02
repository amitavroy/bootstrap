<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;
    private $authUser;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->adminUser = User::find(1);
        $this->authUser = User::find(2);
    }

    /** @test */
    public function an_user_with_manage_roles_permission_should_see_the_listing_page()
    {
        $this->actingAs($this->adminUser)
            ->get(route('roles.index'))
            ->assertStatus(200)
            ->assertSeeText('Roles')
            ->assertSeeText(ucfirst(bs_config('administrator')))
            ->assertSeeText(ucfirst(bs_config('authenticated')));

        $this->actingAs($this->authUser)->assertPageNotAccessable('roles.index');
    }

    /** @test */
    public function user_should_see_list_of_roles()
    {
        factory(Role::class, 10)->create(['name' => 'First role']);
        factory(Role::class)->create(['name' => 'Some random role']);

        $this->actingAs($this->adminUser)
            ->get(route('roles.index'))
            ->assertStatus(200)
            ->assertSeeText('Roles')
            ->assertSeeText('First role')
            ->assertDontSeeText('Some random role');
    }

    /** @test */
    public function a_user_with_managed_role_permission_should_see_create_role_page()
    {
        $this->actingAs($this->adminUser)
            ->get(route('roles.add'))
            ->assertStatus(200)
            ->assertSee('Create new role');

        $this->actingAs($this->authUser)->assertPageNotAccessable('roles.add');
    }

    /** @test */
    public function user_should_be_able_to_create_role()
    {
        $data = ['name' => 'Some role'];

        $this->actingAs($this->adminUser)
            ->post(route('roles.create'), $data)
            ->assertStatus(302)
            ->assertRedirect(route('roles.add'));

        $this->actingAs($this->authUser)
            ->post(route('roles.create'), $data)
            ->assertStatus(403);
    }

    /** @test */
    public function role_name_is_required_while_creating_role()
    {
        $this->actingAs($this->adminUser)
            ->post(route('roles.create'), [])
            ->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function a_user_with_manage_role_can_edit_role()
    {
        $role = factory(Role::class)->create();

        $this->actingAs($this->adminUser)
            ->get(route('roles.edit', $role->id))
            ->assertStatus(200)
            ->assertSee('Edit role ' . $role->name);

        $this->actingAs($this->authUser)
            ->get(route('roles.edit', $role->id))
            ->assertStatus(403);
    }

    /** @test */
    public function a_name_and_id_should_be_given_while_editing_role()
    {
        $this->actingAs($this->adminUser)
            ->post(route('roles.update'), [])
            ->assertSessionHasErrors(['id', 'name']);
    }

    /** @test */
    public function after_edit_new_role_name_is_visible()
    {
        $role = factory(Role::class)->create();

        $data = [
            'name' => 'new name',
            'id' => $role->id,
        ];

        $this->actingAs($this->adminUser)
            ->post(route('roles.update'), $data)
            ->assertRedirect(route('roles.edit', $role->id));

        $this->actingAs($this->adminUser)
            ->get(route('roles.edit', $role))
            ->assertSeeText('new name');
    }
}
