@extends('user.master')
@section('content')


<section class="popular-course-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">All Book</h1>
					<p>Để cho con một hòm vàng không bằng dạy cho con một quyển sách hay</p>
				</div>
			</div>
		</div>
		<div class="row" id="list_book">
			<div class="active-popular-carusel" id="_list_book">
				<!-- <input type="hidden" name="publisher" id="publisher" value="">
 -->
				@foreach($list as $books)
                   <?php
					$book=$books["book"];
					$publisher=$book->publisher;
					?>

					<div class="single-popular-carusel">

						<div class="thumb-wrap relative">
							<div class="thumb relative">
								<div class="overlay overlay-bg"></div>

								<a id="{{$book->id}}" href="{{route('detailBook', $book->id)}}">
									<img style="width: 270px; height: 300px" class="img-fluid" src="{{($book->images[0])->imageURL}}" alt="">
								</a>
							</div>
							<div class="meta d-flex justify-content-between">
								<p><span class="lnr lnr-users"></span>  <span class="lnr lnr-bubble"></span></p>
								<h4 style="color: red;">{{$books["availableQuantity"]}}</h4>
							</div>
						</div>
						<div class="details">
							<a id="{{$book->id}}" href="{{route('detailBook', $book->id)}}">
								<h4>
									{{$book->title}}
								</h4>
							</a>
							<p>
								Nhà xuất bản: <a id="{{$book->publisher_id}}" href="{{route('book', $book->publisher_id)}}">{{$publisher->publisherName}}</a>
							</p>
							<p>
								Năm xuất bản: {{$book->publishedYear}}
							</p>
						</div>

					</div>
				@endforeach
			</div>

		</div>
	</div>
</section>

@endsection
