{{--@extends('layouts.app')--}}
@extends('admin.layouts._layouts')

@section('content')
<div class="container">
    <ul>
        {{--<li><a href="{{ url('/') }}">Главная</a></li>--}}
        {{--<li> <a href="{{route('admin.users.index')}}">Пользователи</a></li>--}}
        {{--<li> <a href="{{route('admin.products.index')}}">Продукты</a></li>--}}
        <li> <a class="btn btn-primary" href="{{route('admin.category.create')}}">СОЗДАТЬ категорию</a></li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th>Наименование</th>
                <th class="text-right">Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->title ?? '' }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('admin.category.edit', $category) }}">Редактировать</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">
                        <h2>Категории отстутствуют</h2>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection