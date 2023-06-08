 <link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('./css/chitiet.css')}}">
<section>
    <h1 style="text-align: center;">{{$book->book_name}} <a href="#">
    <form action="{{ route('books.follow') }}" method="post">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->id }}">
    <button type="submit"><i class="fa-solid fa-plus"></i></button>
    </form>
    </a></h1>
    @foreach ($Section as $data)
    <details open>
      <summary>{{$data->sections_name}}</summary>
      <div>
      @if ($loop->first)
      <div class="icon"><img src="{{ asset("image_data/{$book->book_image}") }}" alt="Book cover"></div>
      @endif
        <p>{{$data->sections_content}}</p>
      </div>
    </details>
    @endforeach  
    <a href="{{route('index')}}">Quay lai</a>

    <div class="action">

  <div class="ratingbook">
    <h2>Đánh giá tác phẩm {{$book->book_name}}</h2>
    <form method="POST" action="{{route('reviews.store',$book)}}">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div>
            <label for="rating">Đánh giá:</label>
            <select name="rating" id="rating">
                <option value="1">1 sao</option>
                <option value="2">2 sao</option>
                <option value="3">3 sao</option>
                <option value="4">4 sao</option>
                <option value="5">5 sao</option>
            </select>
        </div>
        <div>
            <label for="comment">Bình luận:</label>
            <textarea name="comment" id="comment"></textarea>
        </div>
        <div>
            <button type="submit">Gửi đánh giá</button>
        </div>
    </form>
</div>


<h1>Các đánh giá cuốn:  {{ $book->book_name }} </h1>
    <div class="showRating">
        <table>
            <thead>
                <tr>
                    <th>Người dùng</th>
                    <th>Đánh giá</th>
                    <th>Bình luận</th>
                    <th>Ngày</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($reviews as $rating)
                    <tr>
                        <td>{{ $rating->user->id }}</td>
                        <td>{{ $rating->rating }}</td>
                        <td>{{ $rating->comment }}</td>
                        <td>{{ $rating->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


  </section>
  </div>
  <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>