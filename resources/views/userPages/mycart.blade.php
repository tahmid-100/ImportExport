<!-- resources/views/mycart.blade.php -->

@extends('layouts.userMaster')

@section('title', 'My Cart')

@section('content')
<div class="container">
    <h1 class="welcome-message">Welcome {{ auth()->user()->name }}!</h1>

    <div class="centered-content">
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <div class="products">
                @foreach($cartItems as $cartItem)
                <div class="product-card">
                    <div class="product-info">
                        @if($cartItem->image)
                            <img src="{{ asset('images/' . $cartItem->image) }}" alt="{{ $cartItem->product_name }}" class="product-image">
                        @else
                            <p class="no-image">No Image Available</p>
                        @endif
                        <div class="details">
                            <p><strong>Category:</strong> {{ $cartItem->category_name }}</p>
                            <p><strong>Product Name:</strong> {{ $cartItem->product_name }}</p>
                            <p><strong>Serial:</strong> {{ $cartItem->serial }}</p>
                            <p><strong>Model:</strong> {{ $cartItem->model }}</p>
                            <p><strong>Price:</strong> ${{ $cartItem->price }}</p>
                            <p><strong>Unit:</strong> {{ $cartItem->unit }}</p>
                            <div class="buttons">
                            <form action="{{ route('cart.delete', ['cartItem' => $cartItem->id]) }}" method="POST">
                            @csrf
                         @method('DELETE')
                          <button type="submit" class="delete-button">Delete Item</button>
                           </form>
                                <button class="buy-button" >Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
    function deleteItem(cartItemId) {
        // Implement delete functionality here
        alert('Delete item with ID: ' + cartItemId);
    }

    function buyItem(cartItemId) {
        // Implement buy functionality here
        alert('Buy item with ID: ' + cartItemId);
    }
</script>

<style>
.product-card {
    background-color: #add8e6;
    border-radius: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex; 
    flex-direction: column; 
    justify-content: center; 
    align-items: center; 
    margin-bottom: 20px;
    padding: 40px;
    width: 700px;
    margin-left: 100px;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.product-info {
    display: flex;
    align-items: center;
}

.product-image {
    width: 150px;
    height: 150px;
    border-radius: 5px;
    margin-right: 20px;
    margin-bottom: 10px;
}

.no-image {
    font-style: italic;
}

.details {
    flex-grow: 3;
    text-align: center;
}

.welcome-message {
    text-align: center;
}

.category {
    margin-left: 130px;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.delete-button, .buy-button {
    background-color: #ff6347;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-button:hover, .buy-button:hover {
    background-color: #cc4a3c;
}
</style>

@endsection
