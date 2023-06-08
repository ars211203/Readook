<section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Hoàn <span>t</span>hiện</h1>
        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti maiores pariatur assumenda quas
          magni et, doloribus quod voluptate quasi molestiae magnam officiis dolorum, dolor provident atque molestias
          voluptatum explicabo!</p> -->
      </div>
      <div class="service-bottom">
      @foreach($book as $data)
      @if($data->book_status == 1)
        <div class="service-item">
        <div class="icon"><img src="{{ asset("image_data/{$data->book_image}") }}" alt="Book cover"></div>
        <h2><a href="{{route('detail.book',$data->id)}}" id="action_book">{{$data->book_name}}</a></h2>
            <p>{{$data->book_description}}</p>
          </div>
        @endif
        @endforeach
        <!-- phan trang -->
      </div>
    </div>
  </section>