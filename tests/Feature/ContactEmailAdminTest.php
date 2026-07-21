<?php

namespace Tests\Feature;

use App\Models\ContactEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class ContactEmailAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_list_contact_emails(): void
    {
        $this->get('/en/admin/contact-emails')->assertRedirect();
    }

    public function test_non_admin_cannot_list_contact_emails(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get('/en/admin/contact-emails')
            ->assertForbidden();
    }

    public function test_admin_can_list_and_delete_contact_emails(): void
    {
        $admin = User::factory()->admin()->create();
        $inquiry = ContactEmail::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '+237600000000',
            'subject' => 'Quote request',
            'message' => 'Please call me back.',
        ]);

        $this->actingAs($admin)
            ->get('/en/admin/contact-emails')
            ->assertOk()
            ->assertSee('Jane Doe')
            ->assertSee('Quote request');

        $this->actingAs($admin)
            ->get('/en/admin/contact-emails/'.$inquiry->id)
            ->assertOk()
            ->assertSee('Please call me back.');

        $this->actingAs($admin)
            ->delete('/en/admin/contact-emails/'.$inquiry->id)
            ->assertRedirect('/en/admin/contact-emails');

        $this->assertDatabaseMissing('contact_emails', ['id' => $inquiry->id]);
    }

    public function test_prune_command_deletes_old_inquiries(): void
    {
        $old = ContactEmail::create([
            'name' => 'Old',
            'email' => 'old@example.com',
            'phone' => '1',
            'subject' => 'Old',
            'message' => 'Old message',
        ]);
        $old->forceFill(['created_at' => Carbon::now()->subDays(400)])->save();

        $recent = ContactEmail::create([
            'name' => 'Recent',
            'email' => 'recent@example.com',
            'phone' => '2',
            'subject' => 'Recent',
            'message' => 'Recent message',
        ]);

        $this->artisan('contact_emails:prune', ['--days' => 365])
            ->assertSuccessful();

        $this->assertDatabaseMissing('contact_emails', ['id' => $old->id]);
        $this->assertDatabaseHas('contact_emails', ['id' => $recent->id]);
    }
}
