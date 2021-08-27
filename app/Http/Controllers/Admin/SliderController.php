<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{

    function index()
    {
        $list = Slider::all();
        return view('slider.index', compact('list'));
    }
}
