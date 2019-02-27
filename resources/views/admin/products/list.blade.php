@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li> <a href="{{route('admin.users.index')}}">Пользователи</a></li>
        <li> <a href="{{route('admin.products.create')}}">Создать продукт</a></li>
    </ul>
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
            <th scope="col">publish</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
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
                <td>{{$product->publish}}</td>
                <td>{{$product->created_at}}</td>
                <td>
                    <form action="{{route('admin.products.edit', ['id'=>$product->id])}}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="edit" />
                        <input type="submit" value="Редактировать" />
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.products.remove', ['id'=>$product->id])}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="submit" value="Удалить" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{$product->links()}}--}}
</div>
@endsection