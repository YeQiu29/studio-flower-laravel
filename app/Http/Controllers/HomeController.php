<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $specialProducts = Product::where('category', 'Special Product')->get();
        $specialGraduation = Product::where('category', 'Special Graduation')->get();
        $specialWeddings = Product::where('category', 'Special Weddings')->get();
        $specialCake = Product::where('category', 'Special Cake')->get();

        return view('index', compact('specialProducts', 'specialGraduation', 'specialWeddings', 'specialCake'));
    }
}