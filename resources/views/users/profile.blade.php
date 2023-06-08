<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<div class="window">
  <div class="overlay"></div>
  <div class="box header">
  <img src="{{ asset("image_data/{$user->user_image}") }}" alt="Book cover">
    <h2>{{$user->user_fullname}}</h2>
    <h4>{{$user->email}}</h4>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  </div>
  <div class="box footer">
    <ul>
      <li><a href="{{route('readhistory')}}">Lịch sử đọc</a></li>
      <li><a href="{{route('change_passowrd',$user->id)}}">đổi mật khẩu</a></li>
    </ul>
    <a href="{{route('index')}}" class="btn">Quay lại</a>
  </div>
</div>