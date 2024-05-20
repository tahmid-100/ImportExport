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
        return view('adminPages.product', compact('categories'));
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
            $image->storeAs('public/images', $imageName);
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
}
