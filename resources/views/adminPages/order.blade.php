<!-- resources/views/adminPages/order.blade.php -->

@extends('layouts.adminMaster')

@section('title', 'Orders')

@section('content')
<div class="container1">
    <h2 class="header">All Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Serial</th>
                <th>Model</th>
                <th>Price</th>
                <th>Unit</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->category_name }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->serial }}</td>
                <td>{{ $order->model }}</td>
                <td>${{ $order->price }}</td>
                <td>{{ $order->unit }}</td>
                <td>
                    @if($order->image)
                        <img src="{{ asset('images/' . $order->image) }}" alt="{{ $order->product_name }}" class="order-image">
                    @else
                        <p class="no-image">No Image Available</p>
                    @endif
                </td>
                <td>
                    <!-- Add any actions like view or delete here -->
                </td>
            </tr>
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

    .order-image {
        width: 50px;
        height: 50px;
        border-radius: 5px;
    }

    .no-image {
        font-style: italic;
    }
</style>
