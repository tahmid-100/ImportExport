<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function buy($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        // Create a new order
        Order::create([
            'user_id' => $cartItem->user_id,
            'category_name' => $cartItem->category_name,
            'product_name' => $cartItem->product_name,
            'serial' => $cartItem->serial,
            'model' => $cartItem->model,
            'price' => $cartItem->price,
            'unit' => $cartItem->unit,
            'image' => $cartItem->image,
        ]);

        // Optionally, you can remove the item from the cart
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item bought successfully.');
    }


    public function index()
    {
        // Fetch all orders
        $orders = Order::all();

        // Pass the orders to the view
        return view('adminPages.order', compact('orders'));
    }
}
