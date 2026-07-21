<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactEmailController extends Controller
{
    public function index(): View
    {
        $contactEmails = ContactEmail::query()
            ->latest()
            ->paginate(20);

        return view('admin.contact-emails.index', compact('contactEmails'));
    }

    public function show(ContactEmail $contact_email): View
    {
        return view('admin.contact-emails.show', [
            'contactEmail' => $contact_email,
        ]);
    }

    public function destroy(ContactEmail $contact_email): RedirectResponse
    {
        $contact_email->delete();

        return redirect()
            ->route('admin.contact-emails.index', ['language' => app()->getLocale()])
            ->with('success', __('Contact inquiry deleted.'));
    }
}
