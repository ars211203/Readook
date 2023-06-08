<section id="about">
@if(isset($mostViewedBook))
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
        <div class="icon"><img src="{{ asset("image_data/{$mostViewedBook->book_image}") }}" alt="Book cover"></div>
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Sách <span>Nổi</span>bật</h1>
        <h2>{{$mostViewedBook->book_name}}</h2>
        <h2>Lượt đọc: {{$mostViewedBook->book_view}}</h2>
        <a href="{{route('detail.book',$data->id)}}" class="cta">Đọc ngay</a>
      </div>
    </div>
    @else
  <p>Không có sách nào.</p>
@endif
  </section>