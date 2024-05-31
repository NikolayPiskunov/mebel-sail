<?php

namespace App\Repositories;

use App\Models\Orders\Order;
use Illuminate\Support\Collection;

class OrderRepository extends BaseRepository
{
    protected string $modelClass = Order::class;

    public function page(int $limit = 10, int $offset = 0): Collection
    {
        $query = $this->model->query();

        return $this->pagination($query, $limit, $offset)->get();
    }

    public function getCount(): int
    {
        return $this->model->count();
    }

}
