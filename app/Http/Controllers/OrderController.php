<?php

namespace App\Http\Controllers;

use App\Actions\Orders\CreateOrder;
use App\Actions\Orders\DeleteOrder;
use App\Actions\Orders\UpdateOrder;
use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Models\Orders\Order;
use App\Repositories\OrderRepository;
use App\Services\Tables\Factory\TableFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderRepository $orderRepository,
        private readonly UpdateOrder $updateOrder,
        private readonly CreateOrder $createOrder,
        private readonly DeleteOrder $deleteOrder,
    )
    {
        //
    }

    public function index(Request $request): Response
    {
        $this->authorize('viewAny', Order::class);
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 10);

        $pagination = $this->orderRepository->page($perPage, $page);
        $orders = $pagination->items();

        $table = TableFactory::createTable(config('tables.orders.columns'));
        $table->addActionsIf(Auth::check());

        return Inertia::render('Orders/Orders', [
            'orders' => $orders,
            'columns' => $table->toArray(),
            'row_id' => $table->getMainField(),
            'page' => $pagination->currentPage(),
            'per_page' => $pagination->perPage(),
            'count' => $pagination->total(),
        ]);
    }

    public function edit(Order $order): Response
    {
        $this->authorize('edit', $order);

        return Inertia::render('Orders/Edit', [
            'order' => $order,
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $this->authorize('edit', $order);

        ($this->updateOrder)($order, $request->validated());

        return redirect()->back();
    }

    public function store(CreateOrderRequest $request): RedirectResponse
    {
        $this->authorize('create', Order::class);

        ($this->createOrder)($request->validated());

        return redirect()->back();
    }

    public function destroy(Order $order): RedirectResponse
    {
        $this->authorize($order, 'delete');

        ($this->deleteOrder)($order);

        return redirect()->back();
    }
}
