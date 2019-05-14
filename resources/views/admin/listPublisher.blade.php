@extends('admin.master')
@section('content')

    <!-- Main content -->

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="">Trang chủ</a>
            </li>
            <li class="active">Nhà xuất bản</li>

        </ul><!-- /.breadcrumb -->

    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Danh sách Nhà xuất bản</b></h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" id="addPublisher" style="float: right;">
                <i class=" "></i>
                Thêm

            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên Nhà xuất bản</th>

                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
                </thead>
                <tbody id="body_list_publisher">

                    @foreach($list as $publisher)

                        <tr>
                            <td class="text-center">{{$publisher->id}}</td>
                            <td class="text-center">{{$publisher->publisherName}}</td>
                            <td class="text-center">
                                <a href="#" class="text-blue" id="<?php echo $publisher->id; ?>" name="{{$publisher->publisherName}}" data-type="update-publisher" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="text-red" href="#" id="<?php echo $publisher->id; ?>" data-type="delete-publisher" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.content -->

    <div class="modal fade" id="myModal-publisher" role="dialog">
        <div class="modal-dialog">

            <!-- <form method="get" id="form-publisher"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Thêm Nhà xuất bản </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9" >
                                    <div class="form-group" >
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Tên:</label>

                                        <div class="col-sm-7" id="form-publisher">
                                            <input type="text" placeholder="Enter input data ..." class="form-control"  name="type-publisher" id="type-publisher" style="width: 350px; margin-top: 15px;"/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <button class="btn btn-info" type="submit" id="add-publisher">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Thêm
                        </button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

    <div class="modal fade" id="editModal-publisher" role="dialog">
        <div class="modal-dialog">

            <!-- <form action="" method="get"> -->

                <input type="hidden" name="_method" value="patch">
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Sửa thông tin Nhà xuất bản</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <br>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;">Tên: </label>

                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Enter data input ..." class="form-control" name="publisher-type" id="publisher-type" style="width: 350px; margin-top: 5px;" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="modal-footer">
                        <input type="hidden" id="publisher-id" name="publisher-id" value="" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <button class="btn btn-info" type="submit" id="edit-publisher">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Sửa
                        </button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

    <div class="modal fade" id="deleteModal-publisher" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <!-- <form method="get" class="form-delete"> -->
                    <input type="hidden" name="_method" value="delete">
                <!-- {{csrf_field()}} -->

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
                        <input type="hidden" id="publisher-delete" value="" />
                        <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                            <i class="ace-icon fa fa-times red2"></i>
                            No
                        </button>
                        <button class="btn btn-white btn-warning btn-bold" id="_delete-publisher">
                            <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                            Yes
                        </button>

                    </div>
                </form>


            </div>
        </div>
    </div>


@endsection










