@extends('admin.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="text-center border border-light p-5" method="post" action="{{route('admin.products.save')}}">

        <p class="h4 mb-4">
            @if (!isset($product))
                Создать товар
            @else
                Товар №{{$product->id}}
            @endif
        </p>
        <!--csrf-->
        @csrf
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    @if (isset($product))
        <!--Id-->
            <input type="hidden" name="id" value="{{$product->id}}">
    @endif

    <!-- Name -->
        <div class="form-group">
            <label for="Name">Название</label>
            <input name="name" type="text" id="Name" class="form-control mb-4"
                   @if (isset($product))
                   value="{{$product->name}}"
                   @endif
                   placeholder="Название товара">
        </div>
        <!-- articul -->
        <div class="form-group">
            <label for="articul">Артикул</label>
            <input name="articul" type="text" id="articul" class="form-control mb-4"
                   @if (isset($product))
                   value="{{$product->articul}}"
                   @endif
                   placeholder="Артикул">
        </div>
        <div class="form-group">
            <label for="brand">Бренд</label>
            <input name="brand" type="text" id="brand" class="form-control mb-4"
                   @if (isset($product))
                   value="{{$product->brand}}"
                   @endif
                   placeholder="Бренд">
        </div>
        <div class="form-group">
            <label for="Textarea1">Описание</label>
            <textarea name="description" class="form-control rounded-0" id="Textarea1"
                      rows="5">@if (isset($product)){{$product->description}}@endif</textarea>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="Price">Стоимость</label>
            <input name="price" type="number" id="Price" class="form-control mb-2"
                   @if (isset($product))
                   value="{{$product->price}}"
                   @endif
                   placeholder="Стоимость" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        </div>
        <button class="btn btn-info my-4 btn-block" type="submit">Сохранить</button>
    </form>
    @if (isset($product))
        <form class="text-center" method="post" action="{{route('admin.products.del')}}"
              onclick='if (!confirm("Вы уверенны в удалении {{$product->name}}?"))return false;'>
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger mt-4" name="id" value="{{$product->id}}">Удалить товар</button>
        </form>
    @endif
@endsection
