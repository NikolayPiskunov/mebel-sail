<?php

namespace App\Actions\Orders;

use App\Models\Orders\Order;

class UpdateOrder
{

    public function __invoke(Order $order, array $attributes): void
    {
        $order->update($attributes);
    }
}
