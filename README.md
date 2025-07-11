# KICONTA filament-theme

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kiconta/filament-theme.svg?style=flat-square)](https://packagist.org/packages/kiconta/filament-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kiconta/filament-theme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kiconta/filament-theme/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kiconta/filament-theme/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kiconta/filament-theme/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kiconta/filament-theme.svg?style=flat-square)](https://packagist.org/packages/kiconta/filament-theme)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require kiconta/kiconta-filament-theme
```

To install the theme's required JS libraries (install TailwindCSS plugins: forms, typography, and also postcss, and autoprefixer. Create postcss.config.js if it not exists yet), run:

```bash
php artisan kiconta-filament-theme:install
```
```

Add a new item to the `input` array of your `vite.config.js` file:

```js
'vendor/kiconta/kiconta-filament-theme/resources/css/theme.css'
```

Run:

```bash
npm run build
```

## Testing

```bash
composer test
```

Register the plugin on your panel (e.g. `/app/Providers/Filament/AdminPanelProvider.php`):

```php
use Kiconta\FilamentTheme\FilamentThemePlugin;
Plugin;

$panel
  ->plugin(use Kiconta\FilamentTheme\FilamentThemePlugin;
::make())
  ->font('Inter', provider: GoogleFontProvider::class)
  //add image logo in public/images/{folder}
  ->brandLogo(asset('images/kiconta-logo.svg'))
  //change favicon image in public/favicon.svg
  ->favicon(asset('favicon.svg'));

  //Remember Logo and fivicon in public folder.
```

## Color
Color documentation [Documentation](https://devs.kiconta.com.br/fundamentos-visuais/cores)

## Logos Documentation
Logos documentation [Documentation](https://devs.kiconta.com.br/fundamentos-visuais/logo)

## Lib Icons
Lib Icons (Hero Icons) [Documentation](https://devs.kiconta.com.br/fundamentos-visuais/icones)

## Credits

- [joinapi](https://github.com/kiconta)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
