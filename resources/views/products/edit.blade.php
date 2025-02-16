@extends('home')

@section('title', 'Edit Product')

@section('main')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

             <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" id="image" name="image" class="form-control" value="{{ $product->image }}">
            </div> 


            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}"
                    step="0.01" required>
            </div>

            <!-- Discount Price -->
            <div class="mb-3">
                <label for="discount_price" class="form-label">Discount Price</label>
                <input type="number" id="discount_price" name="discount_price" class="form-control"
                    value="{{ $product->discount_price }}" step="0.01">
                <div class="form-text">Optional: Set a discount price (must be less than the regular price).</div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('admin') }}" class="btn btn-primary">Back to Products</a>
        </form>
    </div>
    <br><br>
@endsection
