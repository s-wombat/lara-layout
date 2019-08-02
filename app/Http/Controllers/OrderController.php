<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends CheckoutController
{
    public function create()
    {
//        $this->store();

        // filling in the orders_table
        $order = new Order();
        $order->user_id = Auth::id();
        $order->cost = Cart::subtotal(0, 0, '');
        $order->save();

        // filling in the order_product_table
        $cart = Cart::content();
        foreach($cart as $row){
            $productId = $row->id;
            $price = $row->price;
            $quantity = $row->qty;
        }
        $order->products()->attach($productId, ['price' => $price, 'quantity' => $quantity]);

        Cart::destroy();
        return redirect()->route('products.index')->with('success', 'Ваш заказ успешно обработан');
    }
}
