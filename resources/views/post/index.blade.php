@extends('layouts.default')

@section('title')
    投稿一覧
@endsection

@section('content')
    <h1>@yield('title')</h1>
    <a href="{{ route('post.create') }}">新規投稿</a>
    @empty($posts[0])
    <div>
        投稿はありません
    </div>
    @else
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>作成日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td><a href="{{ route('post.show', $post['id']) }}">{{ $post['title'] }}</a></td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    <form action="{{ route('post.delete', $post['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endempty
@endsection