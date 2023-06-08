@extends('admin.dashboard')
@section('content')
<div class="container">
<form method="POST" action="{{ route('store.book') }}">
    @csrf

    <div class="form-group">
        <label for="book_name" class="form-label">Tên sách</label>
        <input type="text" class="form-control" id="book_name" name="book_name" required>
    </div>
     <div class="form-group">
        <label for="book_image" class="form-label">Ảnh bìa</label>
        <input type="file" class="form-control" id="book_image" name="book_image" placeholder="Ảnh bìa sách" required>
    </div>
    <div class="form-group">
        <label for="book_author" class="form-label">Tác giả</label>
        <input type="text" class="form-control" id="book_author" name="book_author" required>
    </div>
<!-- 
    <div class="form-group">    
        <label for="book_type" class="form-label">Thể loại</label>
        <input type="text" class="form-control" id="book_categories" name="book_type" required>
    </div> -->
    <div class="form-group">
        <label for="book_categories">Categories</label>
        <select class="form-control" id="book_categories" name="book_categories" multiple>
            @foreach ($categories as $data)
                <option value="{{ $data->categories_name }}">{{ $data->categories_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="book_source" class="form-label">Nguồn</label>
        <input type="text" class="form-control" id="book_source" name="book_source" required>
    </div>

    <div class="form-group">
        <label for="book_description" class="form-label">Mô tả sách</label>
        <textarea class="form-control" id="book_description" name="book_description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sách</button>
</form>
</div>
@endsection