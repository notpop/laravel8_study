<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ブログ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="/css/style.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
  </head>

  <body>
    <nav>
      <ul>
        <li>
          <a href="{{ route('top') }}">TOP</a>
        </li>

        @auth
          <li>
            <a href="{{ route('mypage') }}">ブログ一覧</a>
          </li>

          <li>
            ようこそ{{ auth()->user()->name }}さん
          </li>

          <li>
            <form method="post" action="{{ route('logout') }}">
              @csrf
              <input type="submit" value="ログアウト">
            </form>
          </li>
        @else
          <li>
            <a href="{{ route('login') }}">ログイン</a>
          </li>
        @endauth
      </ul>
    </nav>

    @yield('content')
  </body>
</html>
