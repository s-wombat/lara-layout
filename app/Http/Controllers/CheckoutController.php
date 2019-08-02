<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            $cart = Cart::content();
            if(!$cart->isEmpty()){
            $subtotal = Cart::subtotal(0, 0, '');
                return view('products.checkout', [
                    'cart' => $cart,
                    'total' => $subtotal
                ]);
                }else {
                    return redirect()->route('products.index')->with('message', 'Корзина пуста');
                }
        }else {
            return redirect()->back()->with('message', 'Войдите в свой профиль или зарегистрируйтесь');
        }
    }

//    public function store()
//    {
//        $userId = Auth::id();
//        if($userId) {
////            if(!\DB::table('shoppingcart')->where('identifier', '=', $userId)) {
//                Cart::store($userId); // $userId === $identifier
////            }
//        }
//    }


}
