<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allProducts = Product::with('category')->get();
        return view('index', compact('allProducts'));
    }
}
