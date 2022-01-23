@extends('layouts.layout')

@section('content')

<h1>{{ $post->title }}</h1>
{{-- htmlエスケープしない --}}
<div>{!! nl2br(e($post->body)) !!}</div>

<p>書き手 : {{ $post->user->name }}</p>

<h2>コメント</h2>

@foreach ($post->comments as $comment)
  <hr>
  <p>{{ $comment->name }}  ( {{ $comment->created_at }} ) </p>
  <p>{!! nl2br(e($comment->body)) !!}</p>
@endforeach

@endsection
