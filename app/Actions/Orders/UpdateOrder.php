<?php

namespace App\Actions\Orders;

use App\Application\Order\Dtos\UpdateOrderDto;
use App\Models\Orders\Order;

class UpdateOrder
{
    public function update(Order $order, UpdateOrderDto $updateOrderDto): void
    {
        $attributes = [
            'title' => $updateOrderDto->title,
            'description' => $updateOrderDto->description,
            'price' => $updateOrderDto->price,
            'deadline' => $updateOrderDto->deadline,
        ];

        $order->update($attributes);
    }
}
