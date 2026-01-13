<?php

namespace Kiconta\FilamentTheme\Support;

use Filament\Support\Concerns\EvaluatesClosures;

class MenuUtils
{
    use EvaluatesClosures;

    protected array $menu;

    protected array $menu_items;

    public function __construct()
    {
        $currentTenant = filament()->getTenant();

        if ($currentTenant) {
            $this->menu = config('kiconta-filament-theme.menu');
            $this->menu_items = [];
            $this->make();

        } else {
            $this->menu = [];
            $this->menu_items = [];
        }
    }

    protected function make(): void
    {
        foreach ($this->menu as $key => $item) {
            $this->menu_items[$key] = $this->getItens($item);
        }
    }

    protected function getItens($data)
    {
        $result = [];
        foreach ($data as $item) {

            $result[] = [
                'label' => $item['label'],
                'icon' => $item['icon'],
                'url' => $this->evaluate($item['url']),
            ];
        }

        return $result;
    }

    public function getMenu()
    {
        return $this->menu_items;
    }
}
