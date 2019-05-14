@extends('admin.master')
@section('content')

    <!-- Main content -->
        
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="">Trang chủ</a>
                </li>

                
                <li class="active">Sách được trả</li>

            </ul><!-- /.breadcrumb -->

        </div>

        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Sách được trả</b></h3>
                <!-- <button class="btn btn-sm btn-success" data-toggle="modal" id="addhistoryBook" style="float: right;">
                    <i class=" "></i>
                    Add
                      
                </button> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Sách bản sao</th>
                    <!-- <th class="text-center">Book Title</th> -->
                    <th class="text-center">Người dùng</th>
                    <th class="text-center">Họ và Tên</th>
                    <th class="text-center">Chi tiết</th>
                    <!-- <th class="text-center">Rent</th> -->
                    <th class="text-center">Trả</th>
                    <th class="text-center">Trạng thái</th>
                  </tr>
                </thead>
                <tbody id="body_return_book">
        
                    
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    
    <!-- /.content -->

<div class="modal fade" id="myModal-BookHistory" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get" id="form-member">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới Lịch sử</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            
                             <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Sách bản sao:</label>
                                    
                                    <div class="input-group " style="width: 350px;" >
                                      <div class="input-group-btn" style="margin-left: 30px;">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Hành động
                                          <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Hành động</a></li>
                                          <li><a href="#">Hành động khác</a></li>
                                          <li><a href="#">Điều khác tại đây</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Liên kết riêng</a></li>
                                        </ul>
                                      </div>
                                      <!-- /btn-group -->
                                      <input type="text" class="form-control">
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Người dùng:</label>
                                    
                                    <div class="input-group " style="width: 350px;" >
                                      <div class="input-group-btn" style="margin-left: 30px;">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Hành động
                                          <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Hành động</a></li>
                                          <li><a href="#">Hành động khác</a></li>
                                          <li><a href="#">Điều khác tại đây</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Liên kết riêng</a></li>
                                        </ul>
                                      </div>
                                      <!-- /btn-group -->
                                      <input type="text" class="form-control">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-info" type="submit" id="add-member">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thêm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-BookHistory" role="dialog">
    <div class="modal-dialog">

        <form method="get" action="">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa Lịch sử Sách</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Sách bản sao:</label>
                                    
                                    <div class="input-group " style="width: 350px;" >
                                      <div class="input-group-btn" style="margin-left: 30px;">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Hành động
                                          <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Hành động</a></li>
                                          <li><a href="#">Hành động khác</a></li>
                                          <li><a href="#">Điều khác tại đây</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Liên kết riêng</a></li>
                                        </ul>
                                      </div>
                                      <!-- /btn-group -->
                                      <input type="text" class="form-control">
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Người dùng:</label>
                                    
                                    <div class="input-group " style="width: 350px;" >
                                      <div class="input-group-btn" style="margin-left: 30px;">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Hành động
                                          <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Hành động</a></li>
                                          <li><a href="#">Hành động khác</a></li>
                                          <li><a href="#">Điều khác tại đây</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Liên kết riêng</a></li>
                                        </ul>
                                      </div>
                                      <!-- /btn-group -->
                                      <input type="text" class="form-control">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>   
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="member-id" name="member-id" value="" />
                    <input type="hidden" id="_email" value="" />
                    <input type="hidden" id="_password" value="" />
                    <input type="hidden" id="_firt-name" value="" />
                    <input type="hidden" id="_last-name" value="" />
                    <input type="hidden" id="_phone" value="" />
                    <input type="hidden" id="_role-id" value="" />
                    <input type="hidden" id="_image-id" value="" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <input class="btn btn-info" type="submit" value="Edit" id="_edit-member" >

                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-BookHistory" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" class="form-delete">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}}
            
        <!-- Modal content-->
        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận</h4>
                </div>
                <div class="modal-body">
                    
                    <span id="form_output"></span>
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <h4>Bạn có chắc chắn muốn xóa không?</h4>

                        </div>
                    </div>

                </div>  
                
                <div class="modal-footer">
                    <input type="hidden" id="member-delete" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        No
                    </button>
                    <button class="btn btn-white btn-warning btn-bold" id="_delete-member">
                        <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                        Yes
                    </button>
                    
                </div>
            </form>
                
            
        </div>
    </div>
</div>

<div class="modal fade" id="rent-history" order="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="post"> -->
            <!-- Modal content-->
            <div class="modal-content" id="body_detail">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title center" id="detail_title">Danh sách Sách</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" >
                                <!-- <hr style="width: 550px;"> -->
                                <div class="form-group" >
                                    <table id="simple-table" class="table  table-bordered table-hover" style="margin-left:65px">
                                        <thead>
                                            <tr>
                                                <th class="center">Sách bản sao</th>
                                                <th class="center">Sách</th>
                                                <th class="center">Tên sách</th>
                                                <th class="center">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" id="rent_book_copy_id"></td>
                                                <td class="center" id="rent_book_id"></td>
                                                <td class="center" id="rent_book_title"></td>
                                                <td class="center" id="rent_book_state_detail"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                            <!-- <div class="col-sm-9">

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="password2" id="detail_state"></label>
                                    
                                </div>
                            </div> -->

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="rent_user_id" id="rent_user_id" value="">
                    <input type="hidden" name="rent_bookCopy_id" id="rent_bookCopy_id" value="">
                    <button class="btn btn-info" type="submit" id="rent_id">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thuê
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="return-history" order="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="post"> -->
            <!-- Modal content-->
            <div class="modal-content" id="body_detail">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title center" id="detail_title">Danh sách Sách</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" >
                                <!-- <hr style="width: 550px;"> -->
                                <div class="form-group" >
                                    <table id="simple-table" class="table  table-bordered table-hover" style="margin-left:65px">
                                        <thead>
                                            <tr>
                                                <th class="center">Sách bản sao</th>
                                                <th class="center">Sách</th>
                                                <th class="center">Tên Sách</th>
                                                <th class="center">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" id="return_book_copy_id"></td>
                                                <td class="center" id="return_book_id"></td>
                                                <td class="center" id="return_book_title"></td>
                                                <td class="center" id="return_book_state_detail"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                            <!-- <div class="col-sm-9">

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="password2" id="detail_state"></label>
                                    
                                </div>
                            </div> -->

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="return_user_id" id="return_user_id" value="">
                    <input type="hidden" name="return_bookCopy_id" id="return_bookCopy_id" value="">
                    <button class="btn btn-info" type="submit" id="return_id">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Trả
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="active-history" order="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="post"> -->
            <!-- Modal content-->
            <div class="modal-content" id="body_detail">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title center" id="detail_title">Danh sách Sách</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" >
                                <!-- <hr style="width: 550px;"> -->
                                <div class="form-group" >
                                    <table id="simple-table" class="table  table-bordered table-hover" style="margin-left:65px">
                                        <thead>
                                            <tr>
                                                <th class="center">Sách bản sao</th>
                                                <th class="center">Sách</th>
                                                <th class="center">Chi tiết</th>
                                                <th class="center">Năm xuất bản</th>
                                                <th class="center">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" id="active_book_copy_id"></td>
                                                <td class="center" id="active_book_id"></td>
                                                <td class="center" id="active_book_title"></td>
                                                <td class="center" id="active_published_year"></td>
                                                <td class="center" id="active_book_state_detail"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                            <!-- <div class="col-sm-9">

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-12 no-padding-right" for="password2" id="detail_state"></label>
                                    
                                </div>
                            </div> -->

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="active_user_id" id="active_user_id" value="">
                    <input type="hidden" name="active_bookCopy_id" id="active_bookCopy_id" value="">
                    <button class="btn btn-info" type="submit" id="active_id"  data-dismiss="modal">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Ok
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


@endsection



