<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.products', [
            'products' => $products
        ]);
    }

    public function sort(Request $request)
    {
        $products_sort = null;
        $name = $request->input('product_sort');
        if($name){
            $products_sort= Product::orderBy($name)->paginate(10);
        }
        else{
            $products_sort= Product::paginate(10);
        }
        return view('products.products', [
            'products' => $products_sort
        ]);
    }
    public function buyProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }
        if($request->input('qty')){
            $qty = +$request->input('qty');
        }else {
            $qty = 1;
        }
        if($product){
            $productInCart = [
                'id' => $product['id'],
                'name' => $product['name'],
                'qty' => $qty,
                'price' => $product['price']
            ];
            $newProduct = [];
            array_push($newProduct, $productInCart);
        }
        Cart::add($newProduct);
        return redirect(route('products.index'));
    }

}














