@extends('admin.master')
@section('content')

    <!-- Main content -->

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="">Home</a>
            </li>


            <li class="active">Genre</li>

        </ul><!-- /.breadcrumb -->

    </div>


    <!-- /.box -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>List Genre</b></h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" id="addGenre" style="float: right;">
                <i class="ace-icon fa fa-plus bigger-110 white "></i>
                Add

            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Genre Type</th>

                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody id="body_list_genre">

                    @foreach($list as $genre)

                        <tr row_id_genre="<?php echo $genre->id; ?>">
                            <td class="text-center">{{$genre->id}}</td>
                            <td class="text-center">{{$genre->genreType}}</td>
                            <td class="text-center">
                                <a href="#" class="text-blue" id_edit_genre="<?php echo $genre->id; ?>" name="{{$genre->genreType}}" data-type="update-genre" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="text-red" href="#" id_delete_genre="<?php echo $genre->id; ?>" data-type="delete-genre" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach


                </tbody>

            </table>
            <div style="margin-left: 10px;">{!! $list->links() !!}</div>
        </div>
        <!-- /.box-body -->
    </div>
    
    <!-- /.box -->

    <!-- /.content -->

    <div class="modal fade" id="myModal-genre" role="dialog">
        <div class="modal-dialog">

            <!-- <form method="get" id="form-genre"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center"><b>Add Genre</b></h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9" >
                                    <div class="form-group" id="form-genre">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Genre Type:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" placeholder="Enter input data ..." class="form-control"  name="type-genre" id="type-genre" style="width: 350px; margin-top: 15px;"/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <button class="btn btn-info" type="submit" id="add-genre">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Thêm
                        </button> -->

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times text-red"></i>
                    Close</button>
                    <button class="btn btn-success" type="submit" id="add-genre">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Add
                    </button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

    <div class="modal fade" id="editModal-genre" role="dialog">
        <div class="modal-dialog">

            <!-- <form action="" method="get"> -->

                <!-- <input type="hidden" name="_method" value="patch"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center"><b>Edit Genre</b></h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <br>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;"><b>Genre Type: </b></label>

                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Enter input data ..." class="form-control" name="genre-type" id="genre-type" style="width: 350px; margin-top: 5px;" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="modal-footer">
                        <input type="hidden" id="genre-id" name="genre-id" value="" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times text-red"></i>Close</button>
                    <button class="btn btn-info" type="submit" id="edit-genre">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Edit
                    </button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>

    <div class="modal fade" id="deleteModal-genre" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <!-- <form class="form-delete"> -->
                    <!-- <input type="hidden" name="_method" value="delete"> -->
                <!-- {{csrf_field()}} -->

                <!-- Modal content-->

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center"><b>Confirm</b></h3>
                    </div>
                    <div class="modal-body">

                        <span id="form_output"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <h4 class="text-center">You may want to delete ?</h4>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="hidden" id="genre-delete" value="" />
                        <button class="btn btn-default btn-round pull-left" data-dismiss="modal">
                            <i class="ace-icon fa fa-times text-red"></i>
                            No
                        </button>
                        <button class="btn btn-white btn-warning btn-bold" id="_delete-genre">
                            <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                            Yes
                        </button>

                    </div>
                <!-- </form> -->


            </div>
        </div>
    </div>

@endsection





