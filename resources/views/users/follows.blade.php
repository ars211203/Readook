<!DOCTYPE html
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/follows.css')}}">
  <title>Readook </title>
</head>
<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar" style="background-color: #555;">
        <div class="brand">
          <a  href="{{route('index')}}">
            <h1><span>R</span>ead <span>D</span>ook</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="{{route('index')}}">Trang chủ</a></li>
            <li><a href="{{route('list.follow')}}">Theo dõi</a></li>
            <li><a href="{{route('readhistory')}}" data-after="Projects">Lịch sử đọc</a></li>
            <li><a href="#" data-after="About">Giới thiệu</a></li>
            @if(is_null(Auth::id()))
            <li><a href="{{route('login')}}" data-after="Contact">Đăng nhập</a></li>
            @endif
            @if(!is_null(Auth::id()))
            <li><a href="{{route('signOut')}}" data-after="Contact">Đăng xuất: {{Auth::id()}}</a></li>
            <li>
              <a href="{{route('profile',Auth::id())}}" class="icon" data-after="About"><i class="fa-solid fa-user"></i></a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </section>

<h1 id="title">Danh sách theo dõi</h1>
<table id="book-table">
  <thead>

  <th>  Thông báo: 
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
      </th>
    </tr>
    </tr>
    <tr>
      <th>Tên sách</th>
      <th>Tác giả</th>
      <th>Mô tả</th>
      <th>Ảnh bìa</th>
      <th>Ngày theo dõi</th>
      <th>Xóa theo dõi</th>
    </tr>
  </thead>
  <tbody>
  @if (count($books) > 0)
    @foreach ($books as $data)
      <tr>
        <td>{{$data->book_name}}</td>
        <td>{{$data->book_author}}</td>
        <td>data</td>
        <td><img class="book-cover" src="{{ asset("image_data/{$data->book_image}") }}" alt="Book cover"></td>
        <td>{{$data->created_at}}</td>
        <td>
        <form method="POST" action="{{ route('unfollow', $data->id) }}">
            @csrf
            <button type="submit">Xóa</button>
        </form>
        </td>
      </tr>
    @endforeach
  @endif
  <tr>
      <th>
     <form method="POST" action="{{ route('unfollowAll') }}">
            @csrf
            <button type="submit">Xóa tất cả theo dõi</button>
        </form>
      <th>
      <tr>
</tbody>
</table>