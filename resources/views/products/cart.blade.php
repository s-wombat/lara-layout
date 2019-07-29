@extends('layouts.app')
@section('content')

    <div style="height: 135px; content: ''; width: 100%; color: gray;"></div>
    <div class="container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Удалить</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $row)
                    <tr>
                        <td>
                            <form action="{{ route('products.cart.remove', ['id'=>$row->rowId]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete" />
                                <input type="submit" value="Удалить" />
                            </form>
                        </td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->price}}</td>
                        <td>
                            <form action="{{ route('products.cart.update', ['id'=>$row->rowId]) }}" method="get">
                                {{ csrf_field() }}
                                <label for="quantity" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="">
                                    <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $row->qty }}">
                                    <input type="submit" value="Обновить" />
                                </div>
                            </form>
                        </td>
                        <td>{{ $row->cost }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<form action="{{ route('products.order') }}" method="get">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input type="hidden" name="_method" value="order" />--}}
                {{--<input type="submit" value="Оформить заказ" />--}}
            {{--</form>--}}
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('products.index') }}" method="get">
                        <input class="btn btn-primary" type="submit" value="Вернуться к покупкам">
                    </form>
                </div>
                <div class="col-md-4">
                    <p style="color: blue;">Общая стоимость: {{ $total }} грн</p>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('products.cart.destroy') }}" method="get">
                        <input class="btn btn-danger" type="submit" value="Очистить корзину">
                    </form>
                </div>
            </div>
        </div>

@endsection