@extends('layouts.adminMaster')

@section('title', 'Add Products')

@section('content')
    <div class="container">
        <h1 class="header">Add Products</h1>
        
        @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
        @endif

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

    <div class="container1">
        <h2 class="header">All Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Serial Number</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->serial }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:100px; height:60px">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <form action="{{ route('products.update', $product->id) }}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="new_product_name" placeholder="New Product Name" required>
                                    <input type="number" name="new_price" placeholder="New Price" required>
                                    <input type="file" name="image" accept="image/*">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                <form action="{{ route('products.destroy', $product->id) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

    .container1 {
        margin-top: 80px;
        max-width: 2000px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #ddd;
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

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
        display: inline-block;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
        display: inline-block;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .action-buttons form {
        display: inline;
        margin-right: 5px;
    }
</style>

<script>
    // Hide the success message after 2 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 2000); // Adjust the duration (in milliseconds) as needed
</script>
