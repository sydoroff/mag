@extends('admin.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="text-center border border-light p-5" method="post" action="{{route('admin.categories.save')}}">

        <p class="h4 mb-4">
            @if (!isset($categories))
                Создать категорию
            @else
                Категория №{{$categories->id}}
            @endif
        </p>
        <!--csrf-->
        @csrf
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    @if (isset($categories))
        <!--Id-->
            <input type="hidden" name="id" value="{{$categories->id}}">
    @endif

    <!-- Name -->
        <div class="form-group">
            <label for="Name">Название</label>
            <input name="name" type="text" id="Name" class="form-control mb-4"
                   @if (isset($categories))
                   value="{{$categories->name}}"
                   @endif
                   placeholder="Название категории">
        </div>
        <!-- articul -->
        <div class="form-group">
            <label for="articul">Описание</label>
            <input name="articul" type="text" id="articul" class="form-control mb-4"
                   @if (isset($categories))
                   value="{{$categories->description}}"
                   @endif
                   placeholder="Описание">
        </div>
        <div class="form-group">
            <label for="brand">Дочерний каталог</label>
		<select>
		    <option>Пункт 1</option>
		    <option>Пункт 2</option>
		</select>
        </div>
        <button class="btn btn-info my-4 btn-block" type="submit">Сохранить</button>
    </form>
    @if (isset($categories))
        <form class="text-center" method="post" action="{{route('admin.categories.del')}}"
              onclick='if (!confirm("Вы уверенны в удалении {{$categories->name}}?"))return false;'>
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger mt-4" name="id" value="{{$categories->id}}">Удалить категорию</button>
        </form>
    @endif
@endsection
