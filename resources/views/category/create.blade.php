@extends('layouts.default')

@section('title')
    カテゴリ作成
@endsection

@section('content')
<form action="{{ route('category.store') }}" method="post">
    @csrf
    <input type="text" name="name">
    <button type="submit">作成</button>
</form>
@endsection