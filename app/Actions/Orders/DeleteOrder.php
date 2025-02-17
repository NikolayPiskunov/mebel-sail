<?php

namespace App\Actions\Orders;

use App\Models\Orders\Order;

class DeleteOrder
{
    public function delete(Order $order): bool
    {
        return $order->delete();
    }
}
