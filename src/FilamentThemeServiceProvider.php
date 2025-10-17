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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'kiconta-filament-theme');

        $this->mergeConfigFrom(__DIR__ . '/../config/kiconta-filament-theme.php', 'kiconta-filament-theme');

        $this->publishes([
            __DIR__ . '/../resources/css' => resource_path('css'),
            __DIR__ . '/../resources/images' => resource_path('images'),
            __DIR__ . '/../public' => base_path('public'),
        ], 'kiconta-filament-theme-assets');

        $this->publishes([
            __DIR__ . '/../resources/views/components/user-menu.blade.php' => resource_path('views/vendor/filament-panels/components/user-menu.blade.php'),
        ], 'kiconta-filament-theme-views');

        $this->publishes([
            __DIR__ . '/../config/kiconta-filament-theme.php' => config_path('kiconta-filament-theme.php'),
        ], 'kiconta-filament-theme-config');

    }
}
