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
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Телефон</th>
                <th scope="col" class="d-none d-sm-table-cell">Роль</th>
                <th scope="col">&nbsp;</th>
                <!--Пуб<span class="d-sm-none">.</span><span class="d-none d-sm-inline">ликовать</span>-->
            </tr>
            </thead>
            <tbody>

            @foreach ($users as $user)
                <tr>
                    <th scope="row"><a href="{{route('admin.users.edit',['id'=>$user->id ])}}"
                                       class="blue-text">{{ $user->id }}<i class="fas fa-edit  fa-md ml-0 ml-md-2"></i></a>
                    </th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td class="d-none d-sm-table-cell">{{ $user->getRole() }}</td>
                    <td class="px-0">
                        <div class="custom-control custom-checkbox ml-2 d-inline">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked{{ $user->id }}"
                                   checked>
                            <label class="custom-control-label" for="defaultChecked{{ $user->id }}"></label>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
        <div class="text-center"><a href="{{route('admin.users.edit',['id'=>'create'])}}">
                <button class="btn btn-indigo mt-4">Создать пользователя</button>
            </a></div>
    </div>

@endsection
