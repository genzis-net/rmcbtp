<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/en/admin/dashboard');

        $response->assertRedirect();
    }

    public function test_non_admin_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get('/en/admin/dashboard');

        $response->assertForbidden();
    }

    public function test_unverified_admin_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->unverified()->admin()->create();

        $response = $this->actingAs($user)->get('/en/admin/dashboard');

        $response->assertRedirect();
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->get('/en/admin/dashboard');

        $response->assertOk();
    }
}
