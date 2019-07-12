@extends('admin.layouts._layouts')

@section('content')
    <div class="container">
        <form action="{{ route('admin.category.update', $category) }}" method="post">
            @method('PUT')
            {{ csrf_field() }}
            @include('admin.category._form')
        </form>
    </div>
@endsection
