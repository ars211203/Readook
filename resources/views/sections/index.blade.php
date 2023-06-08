@extends('admin.dashboard')
@section('content')
                <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Quản Chương của sách {{$book_name}}</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('book.sections.create',$id)}}" class="btn btn-primary
                        float-end">Thêm chương mới</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bodered">
                <thead>
                    <th>STT</th>
                    <th>Tên chương</th>
                    <th>Nội dung chương</th>
                </thead>
                <tbody>
                @foreach($sections as $data)
                    @if($data->book_id == $id)
                    <tr>
                    <td>{{ $data->id }}</td>
                        <td>{{ $data->sections_name }}</td>
                        <td>{{ $data->sections_content }}</td>  
                        <td>
                        <a class="btn btn-info" href="{{ route('book.sections.edit', $data->id) }}">Sửa Tập</a>
                        <form action="{{route('book.sections.destroy', ['book_id' => $id, 'id' => $data->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa chương</button>
                        </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection