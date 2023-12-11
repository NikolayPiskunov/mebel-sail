<?php

namespace App\Application\Navigation\Services;

use App\Application\Navigation\Contracts\NavigationFactory;
use App\Application\Navigation\Entities\NavigateItem;

class LeftDrawerFactory implements NavigationFactory
{

    public function __construct(
        private array $config,
    )
    {
    }

    public function build(): array
    {
        $array_map = [];

        foreach ($this->config as $key => $item) {
            $array_map[$key] = new NavigateItem(
                $item['label'] ?? '',
                $item['icon'] ?? '',
                $item['route'] ?? '',
            );
        }

        return $array_map;
    }
}
