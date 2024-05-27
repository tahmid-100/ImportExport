<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class AdminDashboardController extends Controller
{
    //

    public function index()
    {
        
        $ordersByCategory = Order::select('category_name', DB::raw('count(*) as count'))
                                 ->groupBy('category_name')
                                 ->get();
        
        
        return view('adminPages.dashboard', compact('ordersByCategory'));
    }
}
