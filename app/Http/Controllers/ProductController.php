<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }
}