<?php

namespace App\Actions\Orders;

use App\Application\Order\Dtos\CreateOrderDto;
use App\Models\Orders\Order;

class CreateOrder
{
    public function create(CreateOrderDto $createOrderDto): Order
    {
        $attributes = [
            'title' => $createOrderDto->title,
            'description' => $createOrderDto->description,
            'price' => $createOrderDto->price,
            'deadline' => $createOrderDto->deadline,
        ];

        /** @var Order */
        return (new Order())->newQuery()
            ->create($attributes);
    }
}
