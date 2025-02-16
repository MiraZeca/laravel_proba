@extends('home')

@section('title', 'Add New Product')

@section('main')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category Selection -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" step="0.01" required>

                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Discount Price -->
            <div class="mb-3">
                <label for="discount_price" class="form-label">Discount Price</label>
                <input type="number" id="discount_price" name="discount_price" class="form-control @error('discount_price') is-invalid @enderror" step="0.01">
                <div class="form-text">Optional: Set a discount price (must be less than the regular price).</div>

                @error('discount_price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="{{ route('admin') }}" class="btn btn-primary">Back to All Products</a>
        </form>
    </div>
    <br><br>
@endsection
