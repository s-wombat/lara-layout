@extends('layouts.layout')
@section('content')
    <!-- Home -->
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background:grey;"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li>Checkout</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <div class="col-lg-2"></div>

                <!-- Order Info -->

                <div class="col-lg-8">
                    <div class="order checkout_section">
                        <div class="section_title">Мой заказ</div>

                        <!-- Order details -->
                        <div class="order_list_container">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Продукт</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Количество</th>
                                    <th scope="col">Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>{{ $row->cost }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>К оплате</td>
                                    <td>{{ $total }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Order Text -->
                        <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
                        <div class="button order_button"><a href="{{ route('products.checkout.create') }}">Подтвердить заказ</a></div>
                    </div>
                <div class="col-lg-2"></div>
                </div>
            </div>
        </div>

{{--                    <p>{{\DB::table('shoppingcart')->select('content')->get()}}</p>--}}
{{--        <p>{{ dd(Cart::restore(\Auth::id())) }}</p>--}}
{{--        <p>{{ dd(Cart::content()) }}</p>--}}
    </div>
@endsection