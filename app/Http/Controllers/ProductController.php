<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function createProduct()
    {
        $product = new Product();
        $product->name = 'New Product: ' . uniqid();
        $product->price = rand(100, 1000);
        $product->category = 'laptop';

        $product->save();

        return $product;
    }

    public function viewAllProducts()
    {
        $products = Product::orderBy('price', 'DESC')->get();

        return view('view-products')
            ->with('products', $products);
    }

    public function addNewProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();

        return redirect('products');
    }
}
