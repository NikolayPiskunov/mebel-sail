<?php

namespace App\Http\Controllers;

use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $list = Order::limit(10)->get();

        return Inertia::render('Orders/Orders', [
            'list' => $list,
        ]);
    }
}
