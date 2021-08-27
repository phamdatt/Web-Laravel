<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    function index()
    {
        $list = Order::all();
        return view('order.index', compact('list'));
    }
}
