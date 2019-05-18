<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Session::get('name')}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <div class="sidebar-form">
        <div class="input-group">
          <input id="data_search" type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('listRole')}}" id="list_role"><i class="fa fa-circle-o"></i> List Role</a></li>
            <li><a href="{{route('listUser')}}"><i class="fa fa-circle-o"></i> List User</a></li>
            <!-- <li><a href="{{route('listImageUser')}}"><i class="fa fa-circle-o"></i> Image User </a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Book</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('listBook')}}"><i class="fa fa-circle-o"></i> List Book </a></li>
            <!-- <li><a href="{{route('listBookQuantity')}}"><i class="fa fa-circle-o"></i> Số lượng Sách </a></li> -->
            <!-- <li><a href="{{route('listBookImage')}}"><i class="fa fa-circle-o"></i> Book Image </a></li> -->
            <!-- <li><a href="{{route('listAuthorBook')}}"><i class="fa fa-circle-o"></i> Author Book </a></li> -->
            <!-- <li><a href="{{route('listBookGenre')}}"><i class="fa fa-circle-o"></i> Book Genre </a></li> -->
            <!-- <li><a href="{{route('listBookCopy')}}"><i class="fa fa-circle-o"></i> Book Copy </a></li> -->
            <!-- <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Image Book </a></li> -->
          </ul>
        </li>
 
        <li><a href="{{route('listRentBook')}}"><i class="fa fa-table"></i> <span>Rent Book</span></a></li>

        <li><a href="{{route('listReturnBook')}}"><i class="fa fa-share "></i> <span>Return Book</span></a></li>

        <li><a href="{{route('listBookHistory')}}"><i class="fa fa-book"></i> <span>Book History </span></a></li>
        <li class="header">OTHERS</li>
        <li><a href="{{route('listPublisher')}}"><i class="fa fa-circle-o text-red"></i> <span>Publisher</span></a></li>
        <li><a href="{{route('listAuthor')}}" id="list_author"><i class="fa fa-circle-o text-yellow"></i> <span>Author</span></a></li>
        <li><a href="{{route('listGenre')}}"><i class="fa fa-circle-o text-green"></i> <span>Genre</span></a></li>
        <!-- <li><a href="{{route('listImage')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Image</span></a></li> -->
      </ul>
</section>
