@extends('admin.master')
@section('content')

    <!-- Main content -->

        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="">Home</a>
                </li>


                <li class="active">Rent Book</li>

            </ul><!-- /.breadcrumb -->

        </div>


        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Rent Book</b></h3>
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
                    <th class="text-center">ID Book Copy</th>
                      <th class="text-center">ID User</th>
                    <th class="text-center">Name</th>

                    <th class="text-center">ID Book</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Rent</th>
                    <!-- <th class="text-center">Return</th> -->
                    <th class="text-center">State</th>
                  </tr>
                </thead>
                <tbody id="body_rent_book">

                  @foreach($list as $history)

                        <tr row_id_rent="{{$history->id}}">
                            <td class="text-center">{{$history->id}}</td>
                            <td class="text-center">{{$history->book_copies_id}}</td>
                            <td class="text-center">{{$history->user_id}}</td>
                            <td class="text-center">{{$history->name}}</td>
                            <td class="text-center">{{$history->book_id}}</td>
                            <td class="text-center">{{$history->title}}</td>
                            <td class="text-center">
                                <a href="#" class="text-yellow" id_active_history="<?php echo $history->id; ?>" book_copies_id="{{$history->book_copies_id}}" user_id="{{$history->user_id}}" name="{{$history->name}}" book_id="{{$history->book_id}}" title="{{$history->title}}" data-type="active-history" data-toggle="modal">
                                    <i class="ace-icon fa fa-eye bigger-130"></i>
                                </a>
                            </td>

                            <td class="text-center">
                                <a class="text-green" href="#" id="<?php echo $history->id; ?>" book_copies_id="{{$history->book_copies_id}}" user_id="{{$history->user_id}}" data-type="rent-history" data-toggle="modal">
                                    <i class="ace-icon fa fa-hourglass-start bigger-130"></i>
                                </a>

                            </td>
                            <td class="text-center">{{$history->state_detail}}</td>
                        </tr>

                    @endforeach

                </tbody>

              </table>
              <div style="margin-left: 0px;">{!! $list->links() !!}</div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    <!-- /.content -->

<div class="modal fade" id="active-history" order="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="post"> -->
            <!-- Modal content-->
            <div class="modal-content" id="body_detail">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title center" id="detail_title">Book</h4>
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
                                                <th class="center">ID Book Copy</th>
                                                <th class="center">ID Book</th>
                                                <th class="center">Title</th>
                                                <th class="center">Published Year</th>
                                                <th class="center">State</th>
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

<div class="modal fade" id="rent-history" order="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="post"> -->
            <!-- Modal content-->
            <div class="modal-content" id="body_detail">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title center" id="detail_title">Book</h4>
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
                                                <th class="center">ID Book Copy</th>
                                                <th class="center">ID Book</th>
                                                <th class="center">Title</th>
                                                <th class="center">State</th>
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
                    <input type="hidden" name="rent_id" id="rent_id" value="">
                    <input type="hidden" name="rent_user_id" id="rent_user_id" value="">
                    <input type="hidden" name="rent_bookCopy_id" id="rent_bookCopy_id" value="">
                    <button class="btn btn-info" type="submit" id="rent_id_">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Rent
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
                                                <th class="center">Sách Bản sao</th>
                                                <th class="center">Sách</th>
                                                <th class="center">Tên sách</th>
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


@endsection



