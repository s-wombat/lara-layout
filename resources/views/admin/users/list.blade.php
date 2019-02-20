@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li> <a href="{{route('admin.users.create')}}">Создать пользователя</a></li>
    </ul>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">created_at</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form action="{{route('admin.users.edit', ['id'=>$user->id])}}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="edit" />
                        <input type="submit" value="Редактировать" />
                    </form>
                    {{--<a href="{{route('admin.users.edit', ['id'=>$user->id])}}">Редактировать</a>--}}
                </td>
                <td>
                    <form action="{{route('admin.users.remove', ['id'=>$user->id])}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="submit" value="Удалить" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{--@if (session('status'))--}}
            {{--<div class="alert alert-success" role="alert">--}}
                {{--{{ session('status') }}--}}
            {{--</div>--}}
        {{--@endif--}}
    </table>
{{--    {{$users->links()}}--}}
</div>
@endsection