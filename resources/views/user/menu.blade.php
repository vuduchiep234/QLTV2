<ul class="nav-menu" style="margin-left: 570px;">
  <li><a href="{{route('homePage')}}">Home</a></li>
  <li><a href="#">About</a></li>

  <li class="menu-has-children"><a href="#">Thể loại</a>
    <ul>
      @foreach($listGenre as $genre)
      <li><a href="{{route('listBookOfGenre', $genre->id)}}">{{$genre->genreType}}</a></li>
      <li class="divider"></li>
      @endforeach

    </ul>
  </li>
  <li class="menu-has-children"><a href="#">Nhà xuất bản</a>
    <ul>
      @foreach($listPublisher as $publisher)
      <li><a href="{{route('book', $publisher->id)}}">{{$publisher->publisherName}}</a></li>
      <li class="divider"></li>
      @endforeach
    </ul>
  </li>

  <li><a href="contact.html">Liên hệ</a></li>
</ul>
