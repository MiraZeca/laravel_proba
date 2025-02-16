<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        $allProducts = Product::with('category')->get();
        return view('login.admin', compact('allProducts'));
    }
    
}

