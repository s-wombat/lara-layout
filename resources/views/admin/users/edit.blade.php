@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            @if(isset($user))
                                Редактирование пользователя {{$user->name}}
                            @else
                                Создание пользователя
                            @endif
                        </h4>
                    </div>
                    {{--{{dump($errors)}}--}}

                    <div class="card-body">
                        <form method="post"
                              @if(isset($user))
                              action="{{route('admin.users.save',['id'=>$user->id])}}"
                              @else
                              action="{{route('admin.users.save')}}"
                                @endif
                        >
                            {{ csrf_field() }}
                            {{--name <input name="name" value="@if(isset($user)){{$user->name}}@endif"/><br/>--}}
                            {{--email <input name="email" value="@if(isset($user)){{$user->email}}@endif"/><br/>--}}
                            {{--phone <input name="phone" value="@if(isset($user)){{$user->phone}}@endif"/><br/>--}}
                            {{--password <input name="password" value=""/>--}}


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="@if(isset($user)){{$user->name}}@endif" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="@if(isset($user)){{$user->email}}@endif" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="@if(isset($user)){{$user->phone}}@endif" autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
                            </div>
                            {{--<button class="btn btn-success" type="submit">Сохранить</button>--}}
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
