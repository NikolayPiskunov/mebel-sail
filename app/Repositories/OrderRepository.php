<?php

namespace App\Repositories;

use App\Models\Orders\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderRepository extends BaseRepository
{
    protected string $modelClass = Order::class;

    public function page(int $limit = 10, int $page = 1): LengthAwarePaginator
    {
        return $this->model->query()
            ->orderBy('id', 'desc')
            ->paginate(
                perPage: $limit,
                page: $page,
            );
    }

    public function getCount(): int
    {
        return $this->model->count();
    }

}
