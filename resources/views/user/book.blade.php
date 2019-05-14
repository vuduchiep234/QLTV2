@extends('user.master')
@section('content')


			<!-- start banner Area -->
			<!-- <section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Popular Courses
							</h1>
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.html"> Popular Courses</a></p>
						</div>
					</div>
				</div>
			</section> -->
			<!-- End banner Area -->

			<!-- Start popular-courses Area -->
			<section class="popular-courses-area section-gap courses-page">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Popular Courses we offer</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>
					<div class="row">

						@foreach($list as $book)
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{$book->imageURL}}" alt="">
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
					<!-- <div><a href="#" class="primary-btn text-uppercase mx-auto" style="margin: 0 auto;">Load More Courses</a></div>	 -->
				</div>
			</section>
			<!-- End popular-courses Area -->



@endsection
