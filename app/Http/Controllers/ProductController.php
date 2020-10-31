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

    public function viewAllProducts(Request $request)
    {
        $products = Product::orderBy('price', 'ASC');

        if ($request->id) {
            $products->where(
                'id',
                $request->id
            );
        }

        if ($request->name) {
            $products->where(
                'name',
                'LIKE',
                '%' . $request->name . '%'
            );
        }

        if ($request->minprice) {
            $products->where(
                'price',
                '>=',
                $request->minprice
            );
        }


        if ($request->maxprice) {
            $products->where(
                'price',
                '<=',
                $request->maxprice
            );
        }

        if ($request->category) {
            $products->where(
                'category',
                $request->category
            );
        }


        $products = $products->get();


        return view('view-products')
            ->with('products', $products)->with('filters', [
                'id' => $request->id,
                'name' => $request->name,
                'minprice' => $request->minprice,
                'maxprice' => $request->maxprice,
                'category' => $request->category,

            ]);
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
