<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function save(ProductRequest $request)
    {
        Product::create([
            'title' => $request->input('product'),
        ]);
    }

    public function index()
    {
        return Inertia::render('Test');
    }
}
