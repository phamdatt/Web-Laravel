<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $list = Category::all();
        return view('category.index', compact('list'));
    }
}
