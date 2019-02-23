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
                                    <th scope="row"><a href="{{route('admin.products.edit',['id'=>$product->id])}}"
                                                       class="blue-text">{{ $product->id }}<i
                                                    class="fas fa-edit  fa-md ml-0 ml-md-2"></i></a></th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>
                                        @foreach ($product->getCategories as $cat)
                                            {{$cat->name}}<br>
                                        @endforeach
                                        <div id="1">
                                        <button onclick="sform(this);" type="button" class="btn btn-primary btn-sm">Добавить</button>
                                        </div>
                                            <script type="text/javascript">

let cat_data=0;

function loadCat() {
    $.ajax({
        type: 'GET',
        url: '{{route('admin.api.get-cat')}}',
        dataType: 'json',
        beforeSend: function (data) {
        },
        success: function (data) {
            cat_data = data.map(function (item) {
                return "<option>"+item['name']+"</option>";
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
        complete: function (data) {

        },
        async:false
    });
}


function sform(rrr) {
''
    let ss = $(rrr.parentNode);
    let sq=$(rrr);
    sq.remove();
    if (cat_data==0) loadCat();
    ss.append('<select></select>');
    ss.children().append(cat_data);
    ss.select(rform(this));
    //alert(cat_data);

}
function rform(rrr) {
    let ss = $(rrr.parentNode);
    let sq=$(rrr);
    sq.remove();
    ss.append('<button onclick="sform(this);" type="button" class="btn btn-primary btn-sm">Добавить</button>');
}
                                        </script>
                                    <td class="d-none d-sm-table-cell">{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="px-0">
                                        <div class="custom-control custom-checkbox ml-2 d-inline">
                                            <input value="{{$product->id}}"
                                                   data-url="{{route('admin.api.publish',['name'=>'Products'])}}"
                                                   type="checkbox"
                                                   class="custom-control-input" id="defaultChecked{{ $product->id }}"
                                                   @if ($product->publish==1)
                                                   checked
                                                    @endif
                                            >
                                            <label class="custom-control-label" for="defaultChecked{{ $product->id }}"></label>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                    <div class="text-center"><a href="{{route('admin.products.create')}}">
                            <button class="btn btn-indigo mt-4">Создать товар</button>
                        </a></div>
                </div>

@endsection

