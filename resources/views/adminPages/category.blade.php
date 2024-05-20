@extends('layouts.adminMaster')

@section('title', 'Add Categories')

@section('content')
    
    


    <div class="container">
        <h1 class="header">Add Categories</h1>

        @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{ route('categories.store') }}" method="POST" class="category-form">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" id="category_name" name="category_name" placeholder="Enter Category" required>
            </div>
            <button type="submit" class="btn" onclick="showAlert()">Create</button>
        </form>

        
       
    </div>

    <div class="container1">
    <h2 class="header">All Categories</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
   <tr>
    <td>{{ $category->name }}</td>
    <td>Active</td>
    <td>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="new_category_name" placeholder="New Category Name" required>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
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
        max-width: 1000px;
        
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
    padding: 12px; /* Adjust the padding as needed */
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

    .category-form .form-group {
        margin-bottom: 20px;
    }

    .category-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }

    .category-form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
    }

    .category-form .btn {
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

    .category-form .btn:hover {
        background-color: #3050d1;
    }

    .alert {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 15px;
    }
</style>

<script>
        // Hide the success message after 1 second
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 2000); // Adjust the duration (in milliseconds) as needed
    </script>