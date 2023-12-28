<?php

namespace App\Http\Controllers;

use App\Models\Clients\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
        $list = Client::limit(10)->get();

        return Inertia::render('Clients/Clients', [
            'list' => $list,
        ]);
    }
}
