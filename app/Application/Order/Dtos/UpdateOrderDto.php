<?php

namespace App\Application\Order\Dtos;

use App\Core\Dto;

final readonly class UpdateOrderDto extends Dto
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public int $price,
        public \DateTimeInterface $deadline,
    )
    {
        //
    }
}
