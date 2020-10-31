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


    private function filter($products)
    {
        return $products->when(request('id'), function ($q) {
            $q->where('id', request()->id);
        })
            ->when(request('name'), function ($q) {
                $q->where('name', 'LIKE', '%' . request()->name . '%');
            })
            ->when(request('minprice'), function ($q) {
                $q->where('price', '>=', request()->minprice);
            })
            ->when(request('maxprice'), function ($q) {
                $q->where('price', '<=', request()->maxprice);
            })
            ->when(request('category'), function ($q) {
                $q->where('category', request()->category);
            });
    }


    public function viewAllProducts(Request $request)
    {
        $products = Product::orderBy('price', 'ASC');

        $products = $this->filter($products);

        $products = $products->get();

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

        return redirect()->route('product.all');
    }


    public function deleteProduct(Request $request)
    {

        Product::where('id', $request->product_id)->delete();
        return redirect()->route('product.all');
    }

    public function editProduct(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        return  view('edit-product')->with('product', $product);
    }

    public function updateProduct(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'name' => $request->name,
            'price' =>  $request->price,
            'category' =>  $request->category,
        ]);
        return redirect()->route('product.all');
    }
}
