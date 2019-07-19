@extends('layouts.layout')
@section('content')
    <div style="height: 115px; content: ''; width: 100%; color: gray;"></div>
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
                <th scope="col">count</th>
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
                        <div class="form-group row">
                            <label for="count" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="">
                                <input id="count" type="text" class="form-control" name="count" value="">
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('products.buy', ['id'=>$product->id])}}" method="get">
                            {{ csrf_field() }}
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