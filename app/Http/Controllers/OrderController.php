<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Services\Tables\Factory\TableFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderRepository $orderRepository,
    )
    {
        //
    }

    public function index(Request $request): Response
    {
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 10);
        $offset = ($page - 1) * $perPage;

        $orders = $this->orderRepository->page($perPage, $offset);
        $ordersCount = $this->orderRepository->getCount();

        $table = TableFactory::createTable(config('tables.orders.columns'));
        $table->addActionsIf(Auth::check());

        return Inertia::render('Orders/Orders', [
            'orders' => $orders,
            'columns' => $table->toArray(),
            'row_id' => $table->getMainField(),
            'page' => (int) $page,
            'per_page' => $perPage,
            'count' => $ordersCount,
        ]);
    }
}
