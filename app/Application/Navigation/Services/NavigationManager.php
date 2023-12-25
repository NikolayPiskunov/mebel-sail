<?php

namespace App\Application\Navigation\Services;

use App\Application\Navigation\Contracts\NavigationFactory;

class NavigationManager
{
    public function __construct(
        private NavigationFactory $leftDrawerFactory,
    )
    {
        //
    }

    public function getLeftDrawerNavigation(): NavigationFactory
    {
        return $this->leftDrawerFactory;
    }
}
