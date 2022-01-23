@extends('layouts.layout')

@section('content')

<h1>ブログ作成</h1>

<form method="post" enctype="multipart/form-data">
  @csrf
  @include('include.error')
  @include('include.message')

  タイトル : <input type="text" name="title" style="width: 400px;" value="{{ old('title') }}">
  <br>
  本文 : <textarea name="body" style="width: 600px; height: 200px;">{{ old('body') }}</textarea>
  <br>
  公開する : <label><input type="checkbox" name="is_open" value="1" {{ old('is_open') ? 'checked' : '' }}></label>
  <br>
  画像 : <input type="file" name="picture">
  <br>
  <br>
  <input type="submit" value="作成">
</form>

@endsection
