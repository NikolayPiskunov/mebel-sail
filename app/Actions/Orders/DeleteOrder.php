<?php

namespace App\Actions\Orders;

use App\Models\Orders\Order;

class DeleteOrder
{
    public function __invoke(Order $order): bool
    {
        return $order->delete();
    }
}
