<?php

namespace App\Actions\Orders;

use App\Models\Orders\Order;

class CreateOrder
{
    public function __invoke(array $attributes): Order
    {
        return Order::create($attributes);
    }
}
