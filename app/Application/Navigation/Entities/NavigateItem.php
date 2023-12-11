<?php

namespace App\Application\Navigation\Entities;

class NavigateItem
{
    public function __construct(
        public string $name,
        public string $icon,
        public string $route,
        public bool $isActive = false,
    )
    {
        //
    }
}
