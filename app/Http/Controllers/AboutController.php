<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class AboutController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();
        $categories = Category::all(); // Dohvatanje svih kategorija iz baze

        return view('about', compact('allProducts', 'categories')); 
    }
}
