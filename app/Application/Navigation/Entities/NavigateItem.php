<?php

namespace App\Application\Navigation\Entities;

class NavigateItem
{
    public function __construct(
        public string $label,
        public string $icon,
        public string $route,
        public bool $isActive = false,
    )
    {
        //
    }
}
