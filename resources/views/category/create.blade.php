@extends('layouts.default')

@section('title')
    カテゴリ作成
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
<form action="{{ route('category.store') }}" method="post">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    <button type="submit">作成</button>
</form>
@endsection