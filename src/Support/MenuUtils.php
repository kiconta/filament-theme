<?php

namespace Kiconta\FilamentTheme\Support;

class MenuUtils
{
    public static function getMenuItems()
    {
        return config('kiconta-filament-theme.menu');
    }
}
