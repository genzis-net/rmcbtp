<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_requires_valid_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/store-contact', [
            'name' => 'Test User',
            'email' => 'not-an-email',
            'phone' => '123456',
            'subject' => 'Hello',
            'message' => 'Message body',
        ]);

        $response->assertStatus(422);
    }
}
