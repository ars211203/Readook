@extends('admin.dashboard')
@section('content')
<form method="POST" action="{{route('store.categories')}}">
    @csrf
    <div class="form-group">
        <label for="book_name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="categories_name" name="categories_name" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
</form>
@endsection