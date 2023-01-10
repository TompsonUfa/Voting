<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>BIFK @yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <nav class="sidebar">
            <div class="sidebar__header">
                <a href="/" class="sidebar__logo">BIFK</a>
            </div>
            <div class="sidebar__content ">
                <h5 class="sidebar__heading">Главная</h5>
                <ul class="sidebar__nav">
                    <li class="sidebar__item">
                        <a href="/" class="sidebar__link {{ Request::is('/*') ? 'sidebar__link_active' : '' }}">
                            <i class="uil uil-estate sidebar__icon"></i>
                            <span>Список голосования</span>
                        </a>
                    </li>
                </ul>
                <h5 class="sidebar__heading">Пользователи</h5>
                <ul class="sidebar__nav">
                    <li class="sidebar__item">
                        <a href="/users"
                            class="sidebar__link {{ Request::is('users*') ? 'sidebar__link_active' : '' }}">
                            <i class="uil uil-clipboard-notes sidebar__icon"></i>
                            <span>Список</span>
                        </a>
                    </li>
                    <li class="sidebar__item">
                        <a href="/register"
                            class="sidebar__link {{ Request::is('register*') ? 'sidebar__link_active' : '' }}">
                            <i class="uil uil-plus-circle sidebar__icon"></i>
                            <span>Регистрация</span>
                        </a>
                    </li>
                </ul>
                <h5 class="sidebar__heading">Голосование</h5>
                <ul class="sidebar__nav">
                    <li class="sidebar__item">
                        <a href="/list-voting"
                            class="sidebar__link {{ Request::is('list-voting*') ? 'sidebar__link_active' : '' }}">
                            <i class="uil uil-clipboard-notes sidebar__icon"></i>
                            <span>Список</span>
                        </a>
                    </li>
                    <li class="sidebar__item">
                        <a href="/create-voting"
                            class="sidebar__link {{ Request::is('create-voting*') ? 'sidebar__link_active' : '' }}">
                            <i class="uil uil-create-dashboard sidebar__icon"></i>
                            <span>Создать</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="main">
            <header class="header px-4 ">
                <label for="check" class="navbar-toggler">
                    <input autocomplete="off" type="checkbox" id="check" class="navbar-toggler__input" />
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </header>
            <div class="container p-4">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
