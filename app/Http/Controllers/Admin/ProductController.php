<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $list = Product::where('ptd_product.status', '<>', 0)
            ->join('ptd_category', 'ptd_product.catid', '=', 'ptd_category.id')
            ->select('ptd_product.*', 'ptd_category.name as namecategory')
            ->orderBy('ptd_product.create_at', 'asc')->get();
        return view('product.index', compact('list'));
    }
}
