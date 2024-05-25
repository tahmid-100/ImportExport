<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    public function showCustomers()
    {
        // Fetch all users with the role of 'customer'
        $customers = User::where('role', 'customer')->get();

        // Pass the customers to the view
        return view('adminpages.customer', compact('customers'));
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);

       
            $customer->delete();
            return redirect()->route('admin.customers')->with('success', 'Customer deleted successfully.');
        

        
    }
}
