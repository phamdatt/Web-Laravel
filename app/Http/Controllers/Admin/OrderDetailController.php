<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    function index()
    {
        $list = OrderDetail::all();
        return view('orderdetail.index', compact('list'));
    }
}
