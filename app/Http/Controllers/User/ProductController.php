<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('users.dashboard.products.index', get_defined_vars());
    }
    public function show($id){
        $product = Product::find($id);
        return view('users.dashboard.products.show', get_defined_vars());
    }
    //
}
