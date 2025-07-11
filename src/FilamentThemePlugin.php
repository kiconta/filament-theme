<?php

namespace Kiconta\FilamentTheme;

use Filament\Contracts\Plugin;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Panel;
use Filament\Support\Facades\FilamentColor;
use App\Providers\Filament\Support\Colors\Color;

class FilamentThemePlugin implements Plugin
{
    public static function make(): static
    {
        return new static;
    }

    public function getId(): string
    {
        return 'kiconta-filament-theme';
    }

    public function register(Panel $panel): void
    {
        /*FilamentColor::register([
            'gray' => [
                50 => '#eceff4',  // nord6 - snow storm
                100 => '#e5e9f0', // nord5 - snow storm
                200 => '#d8dee9', // nord4 - snow storm
                300 => '#a7b1c5',
                400 => '#8c9ab3',
                500 => '#71829b',
                600 => '#4c566a', // nord3 - polar night
                700 => '#434c5e', // nord2 - polar night
                800 => '#3b4252', // nord1 - polar night
                900 => '#2e3440', // nord0 - polar night
                950 => '#232831',
            ],
        ]);*/

        $panel->colors([
            'white' => '#ffffff',
            'black' => '#000000',
            'gray' => Color::Gray,
            'primary' => Color::Primary,
            'secondary' => Color::Secondary,
            'danger' => Color::Danger,
            'success' => Color::Success,
            'warning' => Color::Warning,
            'info' => Color::Secondary,
        ])
            ->viteTheme('vendor/kiconta/kiconta-filament-theme/resources/css/theme.css')
            ->font('Inter', provider: GoogleFontProvider::class)
            ->brandName('Kiconta')
            //add image logo in public/images/{folder}
            ->brandLogo(asset('images/kiconta-logo.svg'))
            //change favicon image in public/favicon.svg
            ->favicon(asset('favicon.svg'));

    }

    public function boot(Panel $panel): void
    {
        //
    }
}
