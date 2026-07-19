<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_product_create_form(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get('/en/admin/products/create')
            ->assertOk();
    }

    public function test_non_admin_cannot_open_product_create_form(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get('/en/admin/products/create')
            ->assertForbidden();
    }
}
