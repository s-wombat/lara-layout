@extends('admin.layouts._layouts')

@section('content')
    <div class="container">
        <form action="{{ route('admin.category.store') }}" method="post">
            {{ csrf_field() }}
            @include('admin.category._form')
        </form>
    </div>
@endsection
