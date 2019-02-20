<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/public/css/style.css" rel="stylesheet">
    <script type="text/javascript">
        var secure_token = '{{ csrf_token() }}';
    </script>
</head>
<body class="grey lighten-3">
<header>
    <!--Navbar -->
    <nav class="mb-1 navbar fixed-top navbar-expand-lg navbar-dark indigo lighten-3 scrolling-navbar">
        <a class="navbar-brand" href="/public/admin/home/"><strong>Админ панель</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Навигация">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products.index')}}">Тоавры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories.index')}}">Каталог</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Заказы
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{route('admin.orders')}}">Все</a>
                        <a class="dropdown-item" href="#">Новые</a>
                        <a class="dropdown-item" href="#">Закрытые</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users.index')}}">Пользователи</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Мои данные </a>
                        <a class="dropdown-item" href="#">Выйти</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>
<main class="pt-4 pt-sm-5">
    <nav class="mt-4 mt-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb white">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="container-fluid mt-4 text-center">
        <div class="card mb-4 d-inline-flex justify-content-center col-sm-9">
            <div class="card-body">

                    @yield('content')

            </div>
        </div>
    </div>
</main>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/public/js/mdb.js"></script>
<script type="text/javascript" src="/public/js/click.js"></script>
</body>
</html>
