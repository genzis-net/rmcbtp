<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadPersistedSettings();

        Blade::directive('contactPhone', function () {
            return "<?php echo \App\Helpers\ContactHelper::getFormattedPhone(); ?>";
        });

        Blade::directive('contactEmail', function () {
            return "<?php echo \App\Helpers\ContactHelper::getFormattedEmail(); ?>";
        });

        Blade::directive('contactAddress', function () {
            return "<?php echo \App\Helpers\ContactHelper::getAddress(); ?>";
        });

        Blade::directive('contactWebsite', function () {
            return "<?php echo \App\Helpers\ContactHelper::getWebsite(); ?>";
        });
    }

    protected function loadPersistedSettings(): void
    {
        try {
            if (!Schema::hasTable('settings')) {
                return;
            }

            $settings = Setting::allCached();

            if ($settings === []) {
                return;
            }

            config([
                'app.name' => $settings['site_name'] ?? config('app.name'),
                'contact.email' => $settings['contact_email'] ?? config('contact.email'),
                'contact.phone' => $settings['contact_phone'] ?? config('contact.phone'),
                'contact.address' => $settings['contact_address'] ?? config('contact.address'),
                'contact.website' => $settings['contact_website'] ?? config('contact.website'),
                'contact.social.facebook' => $settings['contact_facebook'] ?? config('contact.social.facebook'),
            ]);
        } catch (\Throwable $e) {
            // Database may be unavailable during install or early boot.
        }
    }
}
