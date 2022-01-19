@extends('layouts.default')

@section('title')
    {{ $post['title'] }}
@endsection

@section('content')
    <div>
        <h1>@yield('title')</h1>
        <small>カテゴリ：{{ $post['category'] }}</small>
        <p>{!! $post['body'] !!}</p>
        @if (!empty($post['image']))
        <img src="{{ $post['image'] }}" alt="">
        @endif
        <small>{{ $post['updated_at'] }}</small>
    </div>
    <a href="{{ route('post.edit', $post['id']) }}">編集</a>
    <a href="{{ route('post.index') }}">戻る</a>
@endsection