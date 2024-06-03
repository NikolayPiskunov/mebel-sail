<?php

namespace App\Policies\Orders;

use App\Models\Orders\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Order $order): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function edit(User $user, Order $order): bool
    {
        return true;
    }

    public function delete(User $user, Order $order): bool
    {
        return true;
    }
}
