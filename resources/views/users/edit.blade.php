@extends('admin.dashboard')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a href="#" class="btn btn-primary
                        float-end">Danh sách user</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="#"></i>Protypes</a></li>            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{route('user.update',$user->id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa user</h3>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Tên người dùng</Strong>
                <input type="text" name="user_fullname" value="{{$user->user_fullname}}" class="form-control" placeholder="Nhập tên người dùng">              
              </div>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Email</Strong>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Nhập email">              
              </div>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Mật khẩu</Strong>
                <input type="password" name="password" value="{{$user->password}}" class="form-control" placeholder="Nhập password">              
              </div>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Loại tài khoản(chọn 0 or 1)</Strong>
                <input type="text" name="user_type" value="{{$user->user_type}}" class="form-control" placeholder="Chọn 0 hoặc 1">              
              </div>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Avatar</Strong>
                <input type="file" placeholder="image" id="user_image" class="form-control" name="user_image">      
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Lưu chỉnh sửa" class="btn btn-success float-right">
      </div>
    </section>
    </form>
@endsection