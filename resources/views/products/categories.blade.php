@extends('home')

@section('title', 'Add Category')

@section('main')
    <div class="container mt-5">
        <h2 class="mb-4">Create New Category</h2>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            
            <!-- Category Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                
                <!-- Prikaz greške -->
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-primary">Create Category</button>
            <a href="{{ route('admin') }}" class="btn btn-primary">Back to Products</a>
        </form>
    </div>
    <br><br>
@endsection
