@extends('layouts.default')

@section('title')
    投稿編集
@endsection

@section('content')
    <form action="{{ route('post.update', $post['id']) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="" value="{{ old('title', $post['title']) }}">
        <div>
            <select name="category_id">
                @foreach ($categories as $key => $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <textarea name="body" id="" cols="30" rows="10"">{{ old('body', $post['body']) }}</textarea>
        <div>
            @foreach ($tags as $key => $value)
            <input type="checkbox" name="tag_ids[]" value="{{ $value->id }}" id="tag_{{$value->id}}">
            <label for="tag_{{ $value->id }}">{{ $value->name }}</label>
            @endforeach
        </div>
        <button type="submit">更新</button>
    </form>
@endsection