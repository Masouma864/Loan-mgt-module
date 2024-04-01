@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Create Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <!-- CSRF Protection -->
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a> <!-- Add this line -->
    </form>
</div>

@endsection
