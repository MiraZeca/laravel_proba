<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('products.categories', compact('categories'));
    }

    public function create()
    {
        return view('products.categories'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name', // Sprečava duplikate
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin')->with('success', 'Category created successfully!');
    }
}
