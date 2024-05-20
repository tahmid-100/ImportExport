@extends('layouts.adminMaster')

@section('title', 'Add Products')

@section('content')
    <div class="container">
        <h1 class="header">Add Products</h1>
        <form action="{{ route('products.store') }}" method="POST" class="product-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model" name="model" placeholder="Enter Product Model" required>
            </div>
            <div class="form-group">
                <label for="serial">Serial Number</label>
                <input type="text" id="serial" name="serial" placeholder="Enter Serial Number" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" placeholder="Enter Product Price" required>
            </div>

            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="number" id="unit" name="unit" placeholder="Enter Total Unit" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn">Create</button>
        </form>
    </div>
@endsection

<style>
    .container {
        margin-top: 80px;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        color: #333;
    }

    .product-form .form-group {
        margin-bottom: 20px;
    }

    .product-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }

    .product-form input[type="text"],
    .product-form input[type="number"],
    .product-form input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
    }

    .product-form .btn {
        display: inline-block;
        width: 100%;
        padding: 10px;
        background-color: #4070f4;
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .product-form .btn:hover {
        background-color: #3050d1;
    }
</style>
