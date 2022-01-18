@extends('layouts.default')

@section('title')
    カテゴリ一覧
@endsection

@section('content')
    <h1>@yield('title')</h1>
    <a href="{{route('category.create')}}">新規作成</a>
    @empty ($categories[0])
    <div>
        カテゴリが登録されていません
    </div>
    @else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>作成日</th>
                <th>更新日</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $value)
            <tr>
                <td>{{ $value['id'] }}</td>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['created_at'] }}</td>
                <td>{{ $value['updated_at'] }}</td>
                <td>
                    <a href="{{ route('category.edit', $value['id']) }}">編集</a>
                    <form action="{{ route('category.delete', $value['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

@endsection