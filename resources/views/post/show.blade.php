@extends('layouts.default')

@section('title')
    {{ $post['title'] }}
@endsection

@section('content')
    <div>
        {{-- {{dd(\Storage::url($post['image']))}} --}}
        <h1>@yield('title')</h1>
        <small>カテゴリ：{{ $post['category'] }}</small>
        <p>{!! $post['body'] !!}</p>
        @if (!empty($post['image']))
        <img src="{{ \Storage::url($post['image']) }}" style="width: 200px" alt="">
        @endif
        <small>{{ $post['updated_at'] }}</small>
    </div>
    <a href="{{ route('post.edit', $post['id']) }}">編集</a>
    <a href="{{ route('post.index') }}">戻る</a>
@endsection