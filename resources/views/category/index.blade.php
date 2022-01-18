<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>作成日</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $value)
            <tr>
                <td>{{ $value['id'] }}</td>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['created_at'] }}</td>
                <td>{{ $value['updated_at'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>