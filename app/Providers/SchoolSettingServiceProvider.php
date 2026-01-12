<?php

namespace App\Providers;

use App\Models\SchoolSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SchoolSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share school settings with all views
        View::composer('*', function ($view) {
            try {
                $schoolSettings = SchoolSetting::getSettings();
                $view->with('schoolSettings', $schoolSettings);
            } catch (\Exception $e) {
                // Database might not exist yet (during migrations)
                $view->with('schoolSettings', null);
            }
        });
    }
}
