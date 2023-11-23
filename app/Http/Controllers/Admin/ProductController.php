<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products|add product|edit product|delete product', ['only' => ['index', 'store']]);
        $this->middleware('permission:add product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete product', ['only' => ['destroy']]);
    }
    public function index()
    {
        $products = Product::all();
        return view('admins.dashboard.products.index', get_defined_vars());
    }
    public function create()
    {
        $categories = Category::all();
        return view('admins.dashboard.products.create', get_defined_vars());
    }
    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
        return redirect()->route('products.index');
    }
    public function edit(Product $product)
    {
        return view('admins.dashboard.products.edit', compact('product'));
    }
    public function update(CreateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return redirect()->route('products.index');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

}
