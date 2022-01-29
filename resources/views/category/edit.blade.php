@extends('layouts.default')

@section('title')
    カテゴリ編集
@endsection

@section('content')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ old('name', $category->name) }}">
    <button type="submit">更新</button>
</form>
@endsection