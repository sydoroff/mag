@extends('admin.app')

@section('content')


    <div class="card-body">
        <h5>Товар №{{$product->id}}</h5>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="/public/admin/product/">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            Название: <input name="name" type="text" value="{{$product->name}}">
            Описание: <input name="description" type="text" value="{{$product->description}}">
            Цена: <input name="price" type="text" value="{{$product->price}}">
            <input type="submit">
        </form>
    </div>
@endsection
