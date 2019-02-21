@extends('admin.app')

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Кол.товаров</th>
                <th scope="col">&nbsp;</th>
                <!--Пуб<span class="d-sm-none">.</span><span class="d-none d-sm-inline">ликовать</span>-->
            </tr>
            </thead>
            <tbody>

            @foreach ($categories as $cat)
                <tr>
                    <th scope="row"><a href="{{route('admin.categories.edit',['id'=>$cat->id])}}"
                                       class="blue-text">{{ $cat->id }}<i
                                    class="fas fa-edit  fa-md ml-0 ml-md-2"></i></a></th>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>{{ $cat->getProducts->count()}} </td>
                    <td class="px-0">
                        <div class="custom-control custom-checkbox ml-2 d-inline">
                            <input value="{{$cat->id}}" data-url="{{route('admin.categories.active')}}" type="checkbox" class="custom-control-input" id="defaultChecked{{ $cat->id }}"
                                   @if ($cat->publish==1)
				    checked
				    @endif>
                            <label class="custom-control-label" for="defaultChecked{{ $cat->id }}"></label>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        <div class="text-center"><a href="{{route('admin.categories.edit',['id'=>'create'])}}">
                <button class="btn btn-indigo mt-4">Создать категорию</button>
            </a></div>
    </div>

@endsection

