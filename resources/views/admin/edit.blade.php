@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать пользователя</div>

                    <div class="card-body">
                        <form method="post" action="{{route('users.save', ['id'=>$user->id])}}">
                            {{ csrf_field() }}
                            <input name="name" value="{{$user->name}}">
                            <input name="email" value="{{$user->email}}">
                            <input name="phone" value="{{$user->phone}}">
                            <input type="submit" value="save">
                        </form>
                    </div>
                    <div class="card-body">
                        <a href="{{route('users.index')}}">Список пользователей</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
