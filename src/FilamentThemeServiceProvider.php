<?php

namespace Kiconta\FilamentTheme;

use Illuminate\Support\ServiceProvider;
use Kiconta\FilamentTheme\Console\FilamentThemeInstall;

class FilamentThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            FilamentThemeInstall::class,
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/kiconta-filament-theme'),
        ], 'kiconta-filament-theme-views');
    }

    public function boot(): void
    {
        //
    }
}
