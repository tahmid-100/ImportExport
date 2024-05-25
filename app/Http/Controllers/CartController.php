<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    //

     public function index(){
         
        $user = auth()->user();

        // Fetch the cart items for the user
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Pass the cart items to the view
        return view('userpages.mycart', compact('cartItems'));
     }

   

    public function addToCart(Request $request) {
        $categoryId = $request->input('category_id');
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');

        $product = Product::findOrFail($productId);
        $category = Category::findOrFail($categoryId);

        $cartItem = new Cart();
        $cartItem->category_name = $category->name;
        $cartItem->product_name = $product->name; // corrected from $category->name to $product->name
        $cartItem->serial = $product->serial;
        $cartItem->model = $product->model;
        $cartItem->price = $product->price;
        $cartItem->image = $product->image;
        $cartItem->unit = $product->unit;
        $cartItem->user_id = $userId; // corrected to use the variable $userId

        $cartItem->save();

        return response()->json(['message' => 'Product added to cart successfully!']);
    }

    public function delete(Cart $cartItem)
    {
        // Check if the authenticated user owns the cart item
        if (auth()->user()->id !== $cartItem->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this item.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
