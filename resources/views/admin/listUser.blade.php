@extends('admin.master')
@section('content')

    <!-- Main content -->

        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="">Trang chủ</a>
                </li>

                <li>
                    <a href="">Quản lý Người dùng</a>
                </li>
                <li class="active">Danh sách người dùng</li>

            </ul><!-- /.breadcrumb -->

        </div>


        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Danh sách người dùng</b></h3>
                <!-- <button class="btn btn-sm btn-success" data-toggle="modal" id="addUser" style="float: right;">
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
                      <th class="text-center">Tên</th>
                      <th class="text-center">Email</th>
                      <!-- <th class="text-center">Password</th> -->
                      <th class="text-center">Vai trò</th>
                      <th class="text-center">Sửa</th>
                      <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody id="body_list_user">
                    <!-- @foreach($list as $user)

                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">{{$user->password}}</td>
                            <td class="text-center">{{$user->role_id}}</td>
                            <td class="text-center">
                                <a href="#" class="text-blue" id="<?php echo $user->id; ?>" name="{{$user->name}}" email="{{$user->email}}" password="{{$user->password}}" role_id="{{$user->role_id}}" data-type="update-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="text-red" href="#" id="<?php echo $user->id; ?>" data-type="delete-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach -->

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    <!-- /.content -->

<!--  <div class="modal fade" id="myModal-user" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get" id="form-user">
            Modal content
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            PAGE CONTENT BEGINS

                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Name: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="name_user" placeholder="Enter name ..." class="form-control" name="email-user"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Email: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="email_user" placeholder="Enter email ..." class="form-control" name="password-user"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Password: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="password_user" placeholder="Enter password ..." class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Role:</label>

                                    <div class="input-group " style="width: 350px;" >

                                        <div class="input-group-btn" style="margin-left: 30px;">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Option
                                              <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu dropdown_publisher">
                                                @foreach($listR as $role)

                                                    <li id="{{$role->id}}"><a href="#">{{$role->roleType}}</a></li>
                                                    <li class="divider"></li>

                                                @endforeach
                                            </ul>


                                        </div>
                                      /btn-group
                                      <input type="hidden" class="form-control" id="role_id_user">
                                      <input type="text" class="form-control" id="role_user">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit" id="add-user">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> -->

<div class="modal fade" id="editModal-user" role="dialog">
    <div class="modal-dialog">
<!-- 
        <form method="get" action="">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa thông tin Người dùng</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <!-- <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Name: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_name" placeholder="Enter name ..." class="form-control" name="email-user"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Email: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_email" placeholder="Enter email ..." class="form-control" name="password-user"/>
                                    </div>
                                </div>

                            </div> -->

                            <!-- <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Password: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_password" placeholder="Enter password ..." class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;">Vai trò:</label>

                                    <div class="input-group " style="width: 350px;" >

                                        <div class="input-group-btn" style="margin-left: 30px;">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Option
                                              <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu dropdown_user">
                                                @foreach($listR as $role)

                                                    <li id="{{$role->id}}"><a href="#">{{$role->roleType}}</a></li>
                                                    <li class="divider"></li>

                                                @endforeach
                                            </ul>


                                        </div>
                                      <!-- /btn-group -->
                                      <input type="hidden" class="form-control" id="user_role_id">
                                      <input type="text" class="form-control" id="user_role">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="user_id_" name="user-id" value="" />
                    <input type="hidden" id="name" value="" />
                    <input type="hidden" id="email" value="" />
                    <input type="hidden" id="password" value="" />
                    <input type="hidden" id="role_id" value="" />

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <input class="btn btn-info" type="submit" value="Edit" id="_edit-user" >

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


<div class="modal fade" id="deleteModal-user" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- <form method="get" class="form-delete">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}} -->

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
                    <input type="hidden" id="user-delete" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        No
                    </button>
                    <button class="btn btn-white btn-warning btn-bold" id="_delete-user">
                        <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                        Yes
                    </button>

                </div>
            <!-- </form> -->


        </div>
    </div>
</div>



@endsection



