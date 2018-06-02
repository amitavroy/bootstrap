<?php

namespace Tests\Feature;

use App\User;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionsTest extends TestCase
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
    public function a_user_with_manage_perm_can_see_list()
    {
        $this->actingAs($this->adminUser)
            ->get(route('permissions.index'))
            ->assertStatus(200)
            ->assertSeeText(ucfirst(bs_config('manage roles')));

        $this->actingAs($this->authUser)->assertPageNotAccessable('roles.index');
    }

    /** @test */
    public function a_user_can_create_a_permission()
    {
        $data = ['name' => 'Some permissions'];

        $this->actingAs($this->adminUser)
            ->post(route('permissions.create'), $data)
            ->assertRedirect(route('permissions.index'));
    }

    /** @test */
    public function permission_name_required_to_create()
    {
        $this->actingAs($this->adminUser)
            ->post(route('permissions.create'), [])
            ->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function a_user_with_manage_perm_can_edit_permision()
    {
        $permission = factory(Permission::class)->create();

        $this->actingAs($this->adminUser)
            ->get(route('permissions.edit', $permission->id))
            ->assertStatus(200);

        $this->actingAs($this->authUser)
            ->get(route('permissions.edit', $permission->id))
            ->assertStatus(403);
    }

    /** @test */
    public function permission_name_is_required_to_edit_permissions()
    {
        $this->actingAs($this->adminUser)
            ->post(route('permissions.update'), [])
            ->assertSessionHasErrors(['id', 'name']);
    }

    /** @test */
    public function new_permission_name_visible_when_permission_edited()
    {
        $permission = factory(Permission::class)->create();

        $data = [
            'id' => $permission->id,
            'name' => 'something new'
        ];

        $this->actingAs($this->adminUser)
            ->post(route('permissions.update'), $data)
            ->assertRedirect(route('permissions.edit', $permission->id));

        $this->actingAs($this->adminUser)
            ->get(route('permissions.index'))
            ->assertSeeText(ucfirst($data['name']));
    }
}
