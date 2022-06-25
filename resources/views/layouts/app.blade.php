<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SmartTeeth</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column">

<nav class="navbar head">
    <div class="container-fluid">
        <div class="navbar-brand">
            <img src="/foto/mini_logo.svg" onclick="window.location.href='/'" width="80" height="60" class="d-inline-block">
        </div>
        <span class="navbar-text text-light" onclick="window.location.href='/'">SmartTeeth</span>
        @guest
            <button class="btn text-light nav-item" type="button" onclick="window.location.href='/login'">
                <strong>Войти</strong>
            </button>
        @endguest
        @auth
            <button class="btn text-light nav-item" type="button" onclick="window.location.href='/home'">
                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </button>
        @endauth
    </div>
</nav>

@yield('content')

<div class="container-fluid footer d-flex flex-row justify-content-between">
    <span class="user-select-none d-none d-sm-block">УФО ХАКАТОН КЕЙС "ЗУБЫ"<br>ЦИФРОВОЙ ПРОРЫВ СЕЗОН:ИИ<br>
        MYASNIKI TEAM<br>
        <a class="link-light l" href="https://www.freepik.com/vectors/teeth-cartoon">Teeth cartoon vector created by freepik - www.freepik.com</a>
    </span>
    <div>
    <a class="link-light team" href="/info">О проекте</a><br>
    <a class="link-light" href="/api">SmartTeeth API</a>
       </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
