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
							@foreach($list as $book)
							<div class="title text-center">
								<h1 class="mb-10">{{$book->publisherName}}</h1>
								<p>Tong hop sach theo nha xuat ban</p>
							</div>
							@break
							@endforeach
						</div>
					</div>
					<div class="row">

						<div class="active-popular-carusel" id="">
							@foreach($list as $book)
							<div class="single-popular-carusel">
							
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>

										<a id="{{$book->id}}" href="{{route('detailBook', $book->id)}}">
											<img style="width: 270px; height: 300px" class="img-fluid" src="{{$book->imageURL}}" alt="">
										</a>
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span>  <span class="lnr lnr-bubble"></span></p>
										<h4>{{$book->quantity}}</h4>
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
					<!-- <div><a href="#" class="primary-btn text-uppercase mx-auto" style="margin: 0 auto;">Load More Courses</a></div>	 -->
				</div>
			</section>
			<!-- End popular-courses Area -->



@endsection
