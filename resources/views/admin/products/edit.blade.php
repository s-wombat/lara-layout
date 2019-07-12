@extends('admin.layouts._layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            @if(isset($product))
                                Редактирование продукта {{$product->name}}
                            @else
                                Создание продукта
                            @endif
                        </h4>
                    </div>
                    {{--{{dump($errors)}}--}}

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              @if(isset($product))
                              action="{{route('admin.products.save',['id'=>$product->id])}}"
                              @else
                              action="{{route('admin.products.save')}}"
                                @endif
                        >
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="@if(isset($product)){{$product->name}}@endif" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="articul" class="col-md-4 col-form-label text-md-right">{{ __('Articul') }}</label>
                                <div class="col-md-6">
                                    <input id="articul" type="text" class="form-control{{ $errors->has('articul') ? ' is-invalid' : '' }}" name="articul" value="@if(isset($product)){{$product->articul}}@endif" autofocus>
                                    @if ($errors->has('articul'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('articul') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>
                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="@if(isset($product)){{$product->brand}}@endif" autofocus>
                                    @if ($errors->has('brand'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="@if(isset($product)){{$product->description}}@endif" autofocus>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="@if(isset($product)){{$product->price}}@endif" autofocus>
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="publishCheck" class="col-md-4 col-form-label text-md-right">{{ __('Publish') }}</label>
                                <div class="col-md-4">
                                    <input type="checkbox" name="publish" class="form-check-input" id="publishCheck" value="0" />
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Выберите картинки') }}</label>
                                <div class="col-md-4">
                                    <input type="file" name="file[]" id="img" multiple  />
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
                        <a href="{{route('admin.products.index')}}">Список продуктов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
