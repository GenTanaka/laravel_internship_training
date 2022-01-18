<form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ old('name', $category->name) }}">
    <button type="submit">更新</button>
</form>