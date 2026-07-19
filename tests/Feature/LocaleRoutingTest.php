<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocaleRoutingTest extends TestCase
{
    use RefreshDatabase;

    public function test_root_redirects_to_locale(): void
    {
        $response = $this->get('/');

        $response->assertRedirect();
        $this->assertMatchesRegularExpression('#^https?://[^/]+/(en|fr)$#', $response->headers->get('Location'));
    }

    public function test_french_homepage_is_reachable(): void
    {
        $response = $this->get('/fr');

        $response->assertOk();
    }

    public function test_english_homepage_is_reachable(): void
    {
        $response = $this->get('/en');

        $response->assertOk();
    }

    public function test_language_debug_route_is_removed(): void
    {
        $this->get('/en/test-language')->assertNotFound();
    }
}
