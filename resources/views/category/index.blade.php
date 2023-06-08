@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Quản danh mục</h3>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bodered">
                <thead>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
    @foreach($categories as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->categories_name}}</td>
            <td>
                <form action="{{route('destroy.categories',$data->id)}}" method="POST">
                    <a class="btn btn-info" href="{{route('edit.categories',$data->id)}}">Sửa danh mục</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa danh mục</button>
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