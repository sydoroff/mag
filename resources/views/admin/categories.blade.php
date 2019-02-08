@extends('admin.app')

@section('content')
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="grey lighten-2">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Товары</th>
                            <!--Пуб<span class="d-sm-none">.</span><span class="d-none d-sm-inline">ликовать</span>-->
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row" ><a href="./order/{{ $order->id }}" class="blue-text">{{ $order->id }}<i class="fas fa-edit  fa-md ml-0 ml-md-2"></i></a></th>
                                    <td>{{ $order->getUser()->get()->first()->id }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>
                                    @foreach ($order->getProducts()->get() as $product)
                                        {{$product->id}}&nbsp;{{$product->name}}<br>
                                    @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

@endsection
