<form action="{{ route('category.store') }}" method="post">
    @csrf
    <input type="text" name="name">
    <button type="submit">作成</button>
</form>