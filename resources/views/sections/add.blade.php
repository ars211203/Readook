@extends('admin.dashboard')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm chương cho sách có book_id là {{$id}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#"></i>Protypes</a></li>            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{route('book.chapters.add',$id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm chương</h3>
            </div>
            <div class="card-body">            
              <div class="form-group">
                <Strong>Nội dung chương</Strong>
                <textarea class="form-control" id="book_description" name="book_description" rows="3" required></textarea>          
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
          <input type="submit" name="submit" value="Protypes Add" class="btn btn-success float-right">
      </div>
    </section>
    </form>
@endsection