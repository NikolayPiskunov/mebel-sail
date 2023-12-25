<?php

namespace App\Application\Navigation\Services;

use App\Application\Navigation\Contracts\NavigationFactory;
use App\Application\Navigation\Entities\NavigateItem;
use Illuminate\Http\Request;

class LeftDrawerFactory implements NavigationFactory
{

    public function __construct(
        private Request $request,
        private array $config,
    )
    {
    }

    public function build(): array
    {
        return array_values(
            array_map(
                function (array $item) {
                    return $this->mapNavigation($item);
                },
                $this->config
            )
        );
    }

    private function mapNavigation(array $item): NavigateItem
    {
        return new NavigateItem(
            $item['label'] ?? '',
            $item['icon'] ?? '',
            $item['route'] ?? '',
            $this->isActiveRoute($item['route'])
        );
    }

    private function isActiveRoute(string $route): bool
    {
        return $this->request->routeIs($route, $route . '.*');
    }
}
