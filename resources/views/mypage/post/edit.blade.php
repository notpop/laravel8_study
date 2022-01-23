@extends('layouts.layout')

@section('content')

<h1>ブログ編集</h1>

<form method="post" enctype="multipart/form-data">
  @csrf
  @include('include.error')
  @include('include.message')

  タイトル : <input type="text" name="title" style="width: 400px;" value="{{ data_get($post, 'title') }}">
  <br>
  本文 : <textarea name="body" style="width: 600px; height: 200px;">{{ data_get($post, 'body') }}</textarea>
  <br>
  公開する : <label><input type="checkbox" name="is_open" value="1" {{ data_get($post, 'is_open') ? 'checked' : '' }}></label>
  <br>
  <br>
  <input type="submit" value="更新">
</form>

@endsection
