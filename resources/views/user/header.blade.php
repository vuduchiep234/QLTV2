<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-3 col-8 header-top-left no-padding" style="width: 200px" >
				<ul style="width: 200px">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a href="#"><i class="fa fa-behance"></i></a></li>
				</ul>
			</div>

			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
				<input id="search_book" class="form-control" type="text" placeholder="Search" aria-label="Search" onkeypress="return runScript(event)">
				 @if(!Session::has('user_id'))
				<a href="{{route('register')}}"><span class="lnr lnr-phone-handset"></span> <span class="text"><b><u>Đăng ký</u></b></span></a>
				<a href="{{route('login')}}"><span class="lnr lnr-envelope"></span> <span class="text"><b><u>Đăng nhập</u></b></span></a>
				@else
				<li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		              <!-- <img src="backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
		              <span class="hidden-xs"><b>{{Session::get('name')}}</b></span>
		            </a>
		            <ul class="dropdown-menu">

		                <!-- <li> -->
		                  	<div class="col-xs-4 text-center">
		                    	<a id="_register_card" data_id="{{Session::get('user_id')}}" href="#" data-toggle="modal"><span class="hidden-xs" style="color: black; font-size: 12px; float: left; margin-left: 10px;">Đăng ký thẻ</span></a>
		                  	</div>

		              	<!-- </li> -->
		              	<!-- <li> -->
		                  	<div class="col-xs-4 text-center">
		                    	<a id="" data_id="{{Session::get('user_id')}}" href="#" data-toggle="modal"><span class="hidden-xs _change_password" style="color: black; font-size: 12px; float: left; margin-left: 10px;">Đổi mật khẩu</span></a>
		                  	</div>
		              	<!-- </li> -->
		              	<!-- <li> -->
		                  	<div class="col-xs-4 text-center">
		                    	<a class="logout" data_id="{{Session::get('user_id')}}" href="#" data-toggle="modal"><span class="hidden-xs" style="color: black; font-size: 12px; float: left; margin-left: 10px;">Đăng xuất</span></a>
		                  	</div>
		              	<!-- </li> -->

		            </ul>
		        </li>

				@endif
			</div>
		</div>
	</div>
	</div>
	<div class="container main-menu">
	<div class="row align-items-center justify-content-between d-flex">
      <div id="logo">
        <a href="{{route('homePage')}}"><img style="height: 50px; width: 50px;" src="../frontend/img/logo1.png" alt="" title="" /><h3 style="color: white; margin-left: 70px; margin-top: -28px;">Library</h3></a>
      </div>

      <nav id="nav-menu-container">
        @include('user.menu')
      </nav><!-- #nav-menu-container -->
	</div>
</div>
