<?php

namespace App\Providers;

use App\Application\Navigation\Services\LeftDrawerFactory;
use App\Application\Navigation\Services\NavigationManager;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NavigationManager::class, function (): NavigationManager {
            return new NavigationManager(
                new LeftDrawerFactory(config('navigation.left_drawer.left_menu.items', [])),
            );
        });
    }
}
