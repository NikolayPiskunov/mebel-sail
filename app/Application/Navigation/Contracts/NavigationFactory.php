<?php

namespace App\Application\Navigation\Contracts;

use App\Application\Navigation\Entities\NavigateItem;

interface NavigationFactory
{
    /**
     * @return NavigateItem[]
     */
    public function build(): array;
}
