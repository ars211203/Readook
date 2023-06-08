@extends('admin.dashboard')
@section('content')
<form method="POST" action="{{route('update.categories',$categories->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="book_name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" value="{{$categories->categories_name}}" name="categories_name" required>
    </div>
    <button type="submit" class="btn btn-primary">sửa danh mục</button>
</form>
@endsection