@extends('layouts.userMaster')

@section('title', 'My Cart')

@section('content')
<div class="container">
    <h1 class="welcome-message">Welcome {{ auth()->user()->name }}!</h1>

    <div class="centered-content">
        @foreach($categories as $category)
        <div class="category">
            <h2>{{ $category->name }}</h2>
            <div class="products">
                @foreach($category->products as $key => $product)
                <div class="product-card">
                    <div class="product-info">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <p class="no-image">No Image Available</p>
                        @endif
                        <div class="details">
                            <p><strong>Name:</strong> {{ $product->name }}</p>
                            <p><strong>Serial:</strong> {{ $product->serial }}</p>
                            <p><strong>Model:</strong> {{ $product->model }}</p>
                            <p><strong>Price:</strong> ${{ $product->price }}</p>
                            <p><strong>Unit:</strong> {{ $product->unit }}</p>
                            <button type="button" onclick="addToCart({{ $category->id }}, {{ $product->id }})">Add to Cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>


<script>
    function addToCart(categoryId, productId) {
        var userId = {{ auth()->user()->id }};
        alert('Category ' + categoryId + ' and Product ' + productId + ' User_id ' + userId + ' added to cart!');

        window.location.href = "/cart/add?category_id=" + categoryId + "&product_id=" + productId + "&user_id=" + userId;
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
</style>
@endsection


