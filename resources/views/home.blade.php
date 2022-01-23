@extends('layouts.layout')

@section('content')

<h1>ブログ一覧</h1>

<ul>
  @foreach ($posts as $post)
    <li>
      <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
      {{ $post->user->name }}
      ({{ $post->comments_count }}件のコメント)
      <small>{{ $post->created_at }}</small>
    </li>
  @endforeach
</ul>

@endsection
