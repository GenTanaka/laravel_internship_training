@extends('layouts.default')

@section('title')
    投稿作成
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
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
    </div>
    <div>
        <textarea name="body" cols="30" rows="10" placeholder="本文">{{ old('body') }}</textarea>
    </div>
    <div>
        <select name="category_id">
            @foreach ($categories as $key => $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <input type="file" name="image">
    </div>
    <div>
        @foreach ($tags as $key => $value)
        <input type="checkbox" name="tag_ids[]" value="{{ $value->id }}" id="tag_{{$value->id}}">
        <label for="tag_{{ $value->id }}">{{ $value->name }}</label>
        @endforeach
    </div>

    <button type="submit">作成</button>
</form> 
@endsection