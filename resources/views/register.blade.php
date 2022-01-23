@extends('layouts.layout')

@section('content')

<h1>ユーザー登録</h1>

<form method="post">
  @csrf
  @include('include.error')

  名前 : <input type="text" name="name" value="{{ old('name') }}">
  <br>
  メールアドレス : <input type="email" name="email" value="{{ old('email') }}">
  <br>
  パスワード : <input type="password" name="password">
  <br>
  <br>
  <input type="submit" value=" 登録 ">
</form>

@endsection
