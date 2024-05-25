@extends('layouts.adminMaster')

@section('title', 'Customers')

@section('content')
<div class="container1">
    <h2 class="header">All Customers</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            @if($customer->role === 'customer')
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone ?? 'N/A' }}</td>
                <td>
                    @if($customer->image)
                        <img src="{{ asset('images/' . $customer->image) }}" alt="{{ $customer->name }}" class="customer-image">
                    @else
                        <p class="no-image">No Image Available</p>
                    @endif
                </td>
                <td>
                    <!-- Delete Form -->
                    <form action="{{route('customers.destroy',['id' => $customer->id])}}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
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

    .customer-image {
        width: 50px;
        height: 50px;
        border-radius: 5px;
    }

    .no-image {
        font-style: italic;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
