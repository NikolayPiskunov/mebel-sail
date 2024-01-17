<?php

namespace App\Http\Controllers;

use App\Models\Orders\Order;
use App\Services\Tables\Factory\TableFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::limit(10)->get(['id', 'title', 'price', 'deadline']);

        $table = TableFactory::createTable(config('tables.orders.columns'));

        $table = $table->addActionsIf(Auth::check());

        return Inertia::render('Orders/Orders', [
            'orders' => $orders,
            'columns' => $table->toArray(),
            'row_id' => $table->getMainField(),
        ]);
    }
}
