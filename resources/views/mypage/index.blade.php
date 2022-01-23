@extends('layouts.layout')

@section('content')

<h1>ブログ一覧</h1>

@include('include.message')

<a href="{{ route('post.create') }}">ブログ作成</a>
<hr>

<table>
  @foreach ($posts as $post)
    <tr>
      <td>
        <a href="{{ route('post.edit.show', $post) }}">{{ $post->title }}</a>
      </td>

      <td>
        <form method="post" action="{{ route('post.delete', $post) }}">
          @csrf @method('delete') <input type="submit" value="削除">
        </form>
      </td>
    </tr>
  @endforeach
</table>

@endsection
