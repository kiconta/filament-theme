<?php

namespace Kiconta\FilamentTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class FilamentTheme implements Plugin
{
    public function getId(): string
    {
        return 'filament-theme';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('filament-theme', __DIR__ . '/../resources/dist/filament-theme.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('filament-theme');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
