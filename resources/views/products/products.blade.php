@extends('layouts.layout')
@section('content')
    <div style="height: 135px; content: ''; width: 100%; color: gray;"></div>
    <div class="container">
        <form action="{{route('products.sort')}}" method="get">
            {{ csrf_field() }}
            <p>Сортировать по значению: <select size="1" name="product_sort">
                    <option selected value="id">id</option>
                    <option value ="name">name</option>
                    <option value ="articul">articul</option>
                    <option value ="brand">brand</option>
                    <option value ="price">price</option>
                </select></p>
            <p><input type="hidden" name="_method" value="sort" />
                <input type="submit" value="Сортировать" /></p>
        </form>
        @if(\Session::has('message'))
            <div class="col-md-12">
                <h3 style="color:red;">{{ \Session::get('message') }}</h3>
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="col-md-12">
                <h3 style="color:blue;">{{ \Session::get('success') }}</h3>
            </div>
        @endif
        <form action="{{ route('products.cart.index') }}" method="get">
            <input class="btn btn-primary" type="submit" value="Корзина">
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">articul</th>
                <th scope="col">brand</th>
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">buy</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->articul}}</td>
                    <td>{{$product->brand}}</td>
                    <td><img src="{{$product->preview_mobile}}" /></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <form action="{{ route('products.buy', ['id'=>$product->id]) }}" method="get">
                            {{ csrf_field() }}
                                <label for="qty" class="col-md-4 col-form-label text-md-right"></label>
                                <input id="qty" type="text" class="form-control" name="qty" placeholder="1">
                    </td>
                    <td>
                            <input type="hidden" name="_method" value="buy" />
                            <input type="submit" value="Купить" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>

@endsection