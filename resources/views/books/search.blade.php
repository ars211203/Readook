
<!DOCTYPE html
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
            <li><a href="#">Theo dõi</a></li>
            <li><a href="#" data-after="Projects">Lịch sử đọc</a></li>
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
  <!-- start -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
      @if(count($books) == 0)
      <h1 class="section-title">Không tìm<span> T</span>hấy</h1>
        @else
        <h1 class="section-title">Kết<span> Q</span>uả</h1>
      </div>
      <div class="service-bottom">
      @foreach($books as $data)
        <div class="service-item">
        <div class="icon"><img src="{{ asset("image_data/{$data->book_image}") }}" alt="Book cover"></div>
            <h2><a href="{{route('detail.book',$data->id)}}" id="action_book">{{$data->book_name}}</a></h2>
            <p>{{$data->book_description}}</p>
          </div>
          @endforeach
     <div class="pagination justify-content-center">
            {{ $books->links() }}
          </div>
     @endif
      </div>
    </div>
  </section>
   <!-- end -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>R</span>ead <span>D</span>ook</h1>
      </div>
      <h2>Đọc sách đủ đầy sau khi ngủ dậy để biết thêm nhiều điều bổ ích các bạn nhé!</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>  
      </div>
      <!-- <p>Copyright © 2020 Arfan. All rights reserved</p> -->
    </div>
  </section>
  <!-- End Footer -->
  <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>