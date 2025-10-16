<?php

namespace Kiconta\FilamentTheme;

use Illuminate\Support\ServiceProvider;
use Kiconta\FilamentTheme\Console\FilamentThemeInstall;

class FilamentThemeServiceProvider extends ServiceProvider
{
    public const PACKAGE_NAME = 'kiconta/filament-theme';

    public const VENDOR_ASSET = 'kiconta-filament-theme-assets';

    public function register(): void
    {
        $this->commands([
            FilamentThemeInstall::class,
        ]);

        $this->publishes([
            __DIR__ . '/../resources/css' => resource_path('css'),
            __DIR__ . '/../resources/images' => resource_path('images'),
            __DIR__ . '/../public' => base_path('public'),
        ], 'kiconta-filament-theme-assets');


    }
}
