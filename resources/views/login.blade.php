@extends('layouts.layout')

@section('content')

<h1>ログイン</h1>

<form method="post">
  @csrf
  @include('include.error')
  @include('include.message')

  メールアドレス : <input type="email" name="email" value="{{ old('email') }}">
  <br>
  パスワード : <input type="password" name="password">
  <br>
  <br>
  <input type="submit" value=" ログイン ">
</form>

<p style="margin-top: 30px;">
  <a href="{{ route('register') }}">新規ユーザー登録</a>
</p>

@endsection
