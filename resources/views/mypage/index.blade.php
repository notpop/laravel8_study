@extends('layouts.layout')

@section('content')

<h1>ブログ一覧</h1>

<a href="{{ route('post.create') }}">ブログ作成</a>
<hr>

<table>
  @foreach ($posts as $post)
    <tr>
      <td>{{ $post->title }}</td>
    </tr>
  @endforeach
</table>

@endsection
