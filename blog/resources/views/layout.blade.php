<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <header>
            <a href="{{ route('home') }}">логотип</a>
        </header>
        <nav>
            <a href="{{ route('posts.index') }}">Посты</a>
            @auth
                <a href="{{ route('posts.create') }}">Создать пост</a>
                <form method="POST" action="{{route('logout')}}">
                    @csrf

                    <input type="submit" value="Выйти">
                </form>
            @endauth
            @if(!auth()->check())
                <a href="{{ route('register') }}">Зарегистрироваться</a>
                <a href="{{ route('login') }}"> Войти</a>
            @endif

        </nav>

        <main>
            @yield('content')
        </main>
        <footer>
            <p>author: minigungor@git.hub</p>
        </footer>
    </body>
</html>
