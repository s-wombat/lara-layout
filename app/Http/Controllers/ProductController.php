<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $session;

    public function __construct(Request $request)
    {
     //   $this->session = $request->session();
    }
    public function index()
    {
        $products = Product::paginate(10);
//        $products = Product::all();
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
    public function buyProduct(Request $request)
    {
        // $count = $request->input('count');
        // $product = [];

    }

}
