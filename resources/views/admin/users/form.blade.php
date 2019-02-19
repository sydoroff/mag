@extends('admin.app')

@section('content')

    <!-- Default form register -->
    <form class="text-center border border-light p-5" method="post" action="{{route('admin.users.save')}}">

        <p class="h4 mb-4">
            @if (!isset($user))
                Создать пользователя
            @else
                Редактирование пользователя №{{$user->id}}
            @endif
        </p>
        <!--csrf-->
        @csrf
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    @if (isset($user))
        <!--Id-->
            <input type="hidden" name="id" value="{{$user->id}}">
    @endif

    <!-- Name -->
        <input name="name" type="text" id="defaultRegisterFormFirstName" class="form-control mb-4"
               @if (isset($user))
               value="{{$user->name}}"
               @endif
               placeholder="Имя">
        <!-- E-mail -->
        <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control mb-4"
               @if (isset($user))
               value="{{$user->email}}"
               @endif
               placeholder="E-mail">

        <!-- Password -->
        <input name="pass1" type="password" id="defaultRegisterFormPassword" class="form-control mb-2"
               placeholder="Пароль" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <input name="pass2" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Пароль"
               aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            At least 8 characters and 1 digit
        </small>

        <!-- Phone number -->
        <input name="phone" type="text" id="defaultRegisterPhonePassword" class="form-control"
               @if (isset($user))
               value="{{$user->phone}}"
               @endif
               placeholder="Номер телефона" aria-describedby="defaultRegisterFormPhoneHelpBlock">

        <!-- Role -->
        <label class="mt-4">Тип пользователя</label>
        <select name="role" class="browser-default custom-select">
            <option value="" disabled>Выбирете тип пользователя</option>
            <option value="0" selected>Пользователь</option>
            <option value="1">Администратор</option>
        </select>
        <!-- Save button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Сохранить</button>
    </form>


    @if (isset($user))
        <form class="text-center" method="post" action="{{route('admin.users.del')}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger mt-4" name="id" value="{{$user->id}}">Удалить пользователя</button>
        </form>
    @endif

@endsection
