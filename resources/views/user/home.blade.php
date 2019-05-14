@extends('user.master')
@section('content')


<section class="popular-course-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">New Book</h1>
					<p>There is a moment in the life of any aspiring.</p>
				</div>
			</div>
		</div>
		<div class="row" id="list_book">
			<div class="active-popular-carusel" id="_list_book">
				<input type="hidden" name="publisher" id="publisher" value="">

				@foreach($list as $book)
					<div class="single-popular-carusel">
						<div class="thumb-wrap relative">
							<div class="thumb relative">
								<div class="overlay overlay-bg"></div>

								<a id="{{$book->id}}" href="{{route('detailBook', $book->id)}}">
									<img style="width: 250px; height: 300px" class="img-fluid" src="{{$book->imageURL}}" alt="">
								</a>
							</div>
							<div class="meta d-flex justify-content-between">
								<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
								<h4>$150</h4>
							</div>
						</div>
						<div class="details">
							<a id="{{$book->id}}" href="{{route('detailBook', $book->id)}}">
								<h4>
									{{$book->title}}
								</h4>
							</a>
							<p>
								Nhà xuất bản: <a id="{{$book->publisher_id}}" href="{{route('book', $book->publisher_id)}}">{{$book->publisherName}}</a>
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
