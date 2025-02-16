<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index(Request $request)
{
    $perPage = $request->input('per_page', 16); // Defaultno 16
    $categories = Category::all();

    $query = Product::query();

    if ($request->has('category') && $request->category != '') {
        $query->where('category_id', $request->category);
    }

    $allProducts = $query->paginate($perPage); 

    return view('products', compact('allProducts', 'categories'));
}


    public function create()
    {
        $categories = Category::all();
        return view('products.products', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $originalName, 'public');
        }

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin')->with('create', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
        ]);

        $product = Product::findOrFail($id);
        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            $originalName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $originalName, 'public');
        }

        $product->update([
            'name' => $request->name,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
        ]);

        return redirect()->route('admin')->with('success', 'Product updated successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin')->with('delete', 'Product deleted successfully.');
    }
}
