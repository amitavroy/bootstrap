<?php

namespace Tests\Feature;

use App\User;
use Spatie\Valuestore\Valuestore;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;
    private $authUser;
    private $valueStore;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->adminUser = User::find(1);
        $this->authUser = User::find(2);

        $pathToFile = storage_path('tests.json');
        $this->valueStore = Valuestore::make($pathToFile);
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->valueStore->flush();
    }

    /** @test */
    public function a_user_with_manage_settings_perm_can_see_list()
    {
        $this->actingAs($this->adminUser)
            ->get(route('settings.index'))
            ->assertStatus(200);

        $this->actingAs($this->authUser)
            ->get(route('settings.index'))
            ->assertStatus(403);
    }

    /** @test */
    public function a_key_and_value_are_required_to_create_settings()
    {
        $this->actingAs($this->adminUser)
            ->post(route('settings.add'), [])
            ->assertSessionHasErrors(['name', 'value']);
    }
}
