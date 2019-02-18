@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать пользователя</div>
                    <h2>
                        @if(isset($user))
                            Редактирование пользователя {{$user->name}}
                        @else
                            Создание пользователя
                        @endif
                    </h2>
                    <div class="card-body">
                        <form method="post"
                              @if(isset($user))
                              action="{{route('admin.users.store',['id'=>$user->id])}}"
                              @else
                              action="{{route('admin.users.store')}}"
                                @endif
                        >
                            {{ csrf_field() }}
                            name <input name="name" value="@if(isset($user)){{$user->name}}@endif"/>
                            email <input name="email" value="@if(isset($user)){{$user->email}}@endif"/>
                            phone <input name="phone" value="@if(isset($user)){{$user->phone}}@endif"/>
                            password <input name="password" value=""/>
                            <button class="btn btn-success" type="submit">Сохранить</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <a href="{{route('admin.users.index')}}">Список пользователей</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
