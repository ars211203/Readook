@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Quản lý sách</h3>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bodered">
                <thead>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Ảnh bìa</th>
                    <th>Tên tác giả</th>
                    <th>Thể loại</th>
                    <th>Nguồn</th>
                    <th>Trạng thái</th>
                    <th>Mô tả sách</th>
                    <th>Version</th>
                    <th>Lượt đọc</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                @foreach ($book as $book)
                    <tr>
                    <td>{{++$i}}</td>
                        <td>{{$book->book_name}}</td>
                        <td><img src="{{asset('/storage/images/users/'.$book->book_image)}}" alt="" height="50px"></td>
                        <td>{{$book->book_author}}</td>
                        <td>{{$book->book_type}}</td>
                        <td>{{$book->book_source}}</td>
                        <td>{{$book->book_status}}</td>
                        <td>{{$book->book_description}}</td>
                        <td>{{$book->book_version}}</td>
                        <td>{{$book->book_view}}</td>   
                        <td>
                        <a href="{{ route('book.sections' , $book->id) }}" class="btn btn-primary">Thêm Phần</a>
                        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('book.edit', $book->id) }}">Sửa sách</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection