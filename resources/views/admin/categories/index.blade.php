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
                            <th scope="col">Бренд</th>
                            <th scope="col">Каталог</th>
                            <th scope="col" class="d-none d-sm-table-cell">Описание</th>
                            <th scope="col">Цена</th>
                            <th scope="col">&nbsp;</th>
                            <!--Пуб<span class="d-sm-none">.</span><span class="d-none d-sm-inline">ликовать</span>-->
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row" ><a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="blue-text">{{ $product->id }}<i class="fas fa-edit  fa-md ml-0 ml-md-2"></i></a></th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>
                                        @foreach ($product->getCategories as $cat)
                                            {{$cat->name}}<br>
                                        @endforeach
                                    </td>
                                    <td class="d-none d-sm-table-cell">{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="px-0">
                                        <div class="custom-control custom-checkbox ml-2 d-inline">
                                            <input type="checkbox" class="custom-control-input" id="defaultChecked{{ $product->id }}" checked>
                                            <label class="custom-control-label" for="defaultChecked{{ $product->id }}"></label>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                    <div class="text-center"><a href="{{route('admin.products.edit',['id'=>'create'])}}"><button class="btn btn-indigo mt-4">Создать товар</button></a></div>
                </div>

@endsection

