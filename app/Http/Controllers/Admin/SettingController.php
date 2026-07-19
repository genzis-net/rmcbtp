<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::getValue('site_name', config('app.name')),
            'site_description' => Setting::getValue(
                'site_description',
                config('app.description', 'RMC BTP — Quality construction in Cameroon')
            ),
            'contact_email' => Setting::getValue('contact_email', config('contact.email')),
            'contact_phone' => Setting::getValue('contact_phone', config('contact.phone')),
            'contact_address' => Setting::getValue('contact_address', config('contact.address')),
            'contact_website' => Setting::getValue('contact_website', config('contact.website')),
            'contact_facebook' => Setting::getValue('contact_facebook', config('contact.social.facebook')),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:1000',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_address' => 'required|string|max:255',
            'contact_website' => 'nullable|string|max:255',
            'contact_facebook' => 'nullable|url|max:255',
        ]);

        Setting::setMany([
            'site_name' => $data['site_name'],
            'site_description' => $data['site_description'] ?? '',
            'contact_email' => $data['contact_email'],
            'contact_phone' => $data['contact_phone'],
            'contact_address' => $data['contact_address'],
            'contact_website' => $data['contact_website'] ?? '',
            'contact_facebook' => $data['contact_facebook'] ?? '',
        ]);

        $this->applyRuntimeConfig($data);

        return redirect()
            ->route('admin.settings', ['language' => app()->getLocale()])
            ->with('success', __('Settings saved successfully.'));
    }

    protected function applyRuntimeConfig(array $data): void
    {
        config([
            'app.name' => $data['site_name'],
            'contact.email' => $data['contact_email'],
            'contact.phone' => $data['contact_phone'],
            'contact.address' => $data['contact_address'],
            'contact.website' => $data['contact_website'] ?? '',
            'contact.social.facebook' => $data['contact_facebook'] ?? '',
        ]);
    }
}
