<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
            $cart = $this->costItem($cart);
            $subtotal = Cart::subtotal();
        if(!$cart->isEmpty()){
            return view('products.cart', [
                'cart' => $cart,
                'total' => $subtotal
            ]);
        }else {
            return redirect()->route('products.index')->with('message', 'Корзина пуста');
        }
    }
    /**
     * Get the price of the items in the cart.
     *
     * @param null $decimals
     * @param null $decimalPoint
     * @param null $thousandSeperator
     * @return string
     */
    public function costItem($arr)
    {
        foreach($arr as $row) {
            $row->cost = $row->qty * $row->price;
        }
        return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Cart::store('user_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('quantity')){
            $qty = +$request->input('quantity');
        }else {
            $qty = $request->old('quantity');
        }
        Cart::update($id, $qty);
        return redirect(route('products.cart.index'));
    }


    /**
     * @param $id
     */
    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect(route('products.cart.index'));
    }

    /**
     * @return string
     */
    public function destroy()
    {
        Cart::destroy();
        return redirect(route('products.index'));
    }
}
