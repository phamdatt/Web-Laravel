<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    function index()
    {
        $list = Menu::all();
        return view('menu.index', compact('list'));
    }
}
