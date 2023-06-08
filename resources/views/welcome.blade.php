
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
      <div class="nav-bar">
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
            <li><a href="{{route('signOut')}}" data-after="Contact"><i class="fa-solid fa-right-from-bracket"></i>: {{Auth::id()}}</a></li>
            <li>
              <a href="{{route('profile',Auth::id())}}" class="icon" data-after="About"><i class="fa-solid fa-user"></i></a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Xin chào {{Auth::id()}},<span></span></h1>
        <h1>Chào mừng bạn đến với<span></span></h1>
        <h1>Readook <span></span></h1>
        <div class="newlatter">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="key" placeholder="Tìm kiếm sách...">
                <input type="submit" name="submit" value="Tìm kiếm">
            </form>
        </div>
        <!-- <a href="#projects" type="button" class="cta">Đọc ngay</a> -->
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">tất cả <span>S</span>ách</h1>
      </div>
      <div class="service-bottom">
      @if(count($book) > 0)
      @foreach($book as $data)
        <div class="service-item">
        <div class="icon"><img src="{{ asset("image_data/{$data->book_image}") }}" alt="Book cover"></div>
            <h2><a href="{{route('detail.book',$data->id)}}" id="action_book">{{$data->book_name}}</a></h2>
            <p>{{$data->book_description}}</p>
          </div>
          @endforeach
          @else
            <p>Không có sách nào.</p>
          @endif
          <div class="pagination justify-content-center">
      {{ $book->links() }}
    </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Sách <span>M</span>ới</h1>
      </div>
      <div class="service-bottom">
      @if(count($book) > 0)
      @foreach($new_book as $data)
        <div class="service-item">
        <div class="icon"><img src="{{ asset("image_data/{$data->book_image}") }}" alt="Book cover"></div>
        <h2><a href="{{route('detail.book',$data->id)}}" id="action_book">{{$data->book_name}}</a></h2>
            <p>{{$data->book_description}}</p>
          </div>
        @endforeach
        @else
            <p>Không có sách nào.</p>
          @endif
        {{ $new_book->links() }}
        <!-- phan trang -->
      </div>
    </div>
  </section>
  <!-- lay theo trang thai -->
  @include('book_status')
  <!-- Projects Section -->
  <!-- End Projects Section -->

  <!-- About Section -->
  @include('topbook')
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Liên hệ <span>Qua</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Số điện thoại</h1>
            <h2>+84 989748659</h2>
            <h2>+84 989748659</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>21211TT2122@mail.tdc.edu.vn</h2>
            <h2>21211TT2122@mail.tdc.edu.vn</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Địa chỉ</h1>
            <h2>66b nguyễn sỹ sách p15 quận tân bình</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
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
</html>