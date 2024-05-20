<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('adminPages.category', compact('categories'));
    }
    


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->category_name,
        ]);

        // Redirect back with a success message
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function update(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Validate the request data
        $request->validate([
            'new_category_name' => 'required|string|max:255',
        ]);

        // Update the category name
        $category->update([
            'name' => $request->new_category_name,
        ]);

        // Redirect back with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
{
    // Find the category by ID
    $category = Category::findOrFail($id);
    
    // Delete the category
    $category->delete();

    // Redirect back with a success message
    return back()->with('success', 'Category deleted successfully.');
}



}
