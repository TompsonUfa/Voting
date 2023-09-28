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
    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        @if(auth()->user()->isModerator() || auth()->user()->isAdmin())
            <nav class="sidebar">
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
                    @if(auth()->user()->isAdmin())
                        <h5 class="sidebar__heading" >Пользователи</h5>
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
                    @endif
                    @if(auth()->user()->isModerator() || auth()->user()->isAdmin())
                        <h5 class="sidebar__heading">Голосование</h5>
                        <ul class="sidebar__nav">
                            <li class="sidebar__item">
                                <a href="/voting"
                                    class="sidebar__link {{ Request::is('list-voting*') ? 'sidebar__link_active' : '' }}">
                                    <i class="uil uil-clipboard-notes sidebar__icon"></i>
                                    <span>Список</span>
                                </a>
                            </li>
                            <li class="sidebar__item">
                                <a href="/voting/create"
                                    class="sidebar__link {{ Request::is('create-voting*') ? 'sidebar__link_active' : '' }}">
                                    <i class="uil uil-create-dashboard sidebar__icon"></i>
                                    <span>Создать</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </nav>
        @endif
        <div class="menu">
                <div class="menu__item">
                    <a href="{{route('home')}}" class="menu__link">
                        <i class="uil uil-estate menu__icon"></i>
                    </a>
                </div>
                @if(auth()->user()->isAdmin())
                    <div class="menu__item">
                        <a href="{{route('users.index')}}" class="menu__link">
                            <i class="uil uil-users-alt menu__icon"></i>
                        </a>
                    </div>
                @endif
                @if(auth()->user()->isModerator() || auth()->user()->isAdmin())
                    <div class="menu__item">
                        <a href="{{route('voting.index')}}" class="menu__link">
                            <i class="uil uil-clipboard-notes menu__icon"></i>
                        </a>
                    </div>
                @endif
            </div>
        <main class="main">
            @yield('content')
        </main>
    </div>
</body>

</html>
