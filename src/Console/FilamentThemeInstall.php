<?php

namespace Kiconta\FilamentTheme\Console;

use Illuminate\Console\Command;
use Kiconta\FilamentTheme\FilamentThemeServiceProvider;

class FilamentThemeInstall extends Command
{
    public const SUCCESS = 0;

    /**
     * @var 1
     */
    public const FAILURE = 1;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'kiconta-filament-theme:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Filament Kiconta theme assets';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Installing the Kiconta filament theme...');

        $this->call('vendor:publish', [
            '--tag' => FilamentThemeServiceProvider::VENDOR_ASSET,
            '--force' => true,
        ]);

        return static::SUCCESS;
    }
}
