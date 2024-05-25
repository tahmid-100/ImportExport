<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    //

    public function index(){

        $categories = Category::with('products')->get();
    


        return view('userpages.dashboard',compact('categories'));


    }
}
