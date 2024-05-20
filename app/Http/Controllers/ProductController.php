<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all(); 
        return view('adminPages.product', compact('categories','products'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'unit' => 'required|integer|min:0',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
        } else {
            $imageName = null; // Default image if not provided
        }

        // Create a new product
        Product::create([
            'name' => $request->name,
            'serial' => $request->serial,
            'model' => $request->model,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $imageName,
            'unit' => $request->unit,
        ]);

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the image if exists
        if ($product->image) {
            unlink(public_path('images/' . $product->image));
        }

        // Delete the product
        $product->delete();

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }



    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'new_product_name' => 'required|string|max:255',
            'new_price' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);

            // Delete old image if exists
            if ($product->image) {
                unlink(public_path('images/' . $product->image));
            }

            $product->image = $imageName;
        }

        // Update product data
        $product->name = $request->new_product_name;
        $product->price = $request->new_price;
        $product->save();

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }
}
