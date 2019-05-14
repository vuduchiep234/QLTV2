<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="backend/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="backend/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="backend/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <script src="backend/bower_components/select2/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="backend/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 3 -->
<script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="backend/bower_components/raphael/raphael.min.js"></script>
<script src="backend/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="backend/bower_components/moment/min/moment.min.js"></script>
<script src="backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="backend/dist/js/demo.js"></script>


<script type="text/javascript" src="js/Author.js"></script>
<script type="text/javascript" src="js/Role.js"></script>
<script type="text/javascript" src="js/Publisher.js"></script>
<script type="text/javascript" src="js/Genre.js"></script>
<script type="text/javascript" src="js/User.js"></script>
<!-- <script type="text/javascript" src="js/Card.js"></script> -->
<script type="text/javascript" src="js/BookHistory.js"></script>
<script type="text/javascript" src="js/Book.js"></script>
<script type="text/javascript" src="js/RentBook.js"></script>
<script type="text/javascript" src="js/ReturnBook.js"></script>
<script type="text/javascript" src="../js/Home.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('admin.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('admin.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('admin.footer')
  </footer>

<div class="modal fade" id="confirm_logout" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- <form method="get" class="form-delete">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}} -->

        <!-- Modal content-->

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;"><b>Confirm</b></h4>
                </div>
                <div class="modal-body">

                    <span id="form_output"></span>
                    <div class="row">
                        <div class="col-xs-12" style="text-align: center;">
                            <!-- PAGE CONTENT BEGINS -->
                            <h4>You may want to logout ?</h4>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" id="user-delete" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <!-- <i class="ace-icon fa fa-times red2"></i> -->
                        No
                    </button>
                    <button class="btn btn-white btn-warning " id="logout_user">
                        <!-- <i class="ace-icon fa fa-trash-o bigger-120 orange"></i> -->
                        Yes
                    </button>

                </div>
            <!-- </form> -->


        </div>
    </div>
</div>


<div class="modal fade" id="changePassword-user" role="dialog">
    <div class="modal-dialog">
<!-- 
        <form method="get" action="">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;"><b>Change Password</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 10px;">Current Password: </label>

                                    <div class="col-sm-9" style="margin-top: 15px; margin-left: -15px; width: 380px;">
                                        <input type="password" id="current" placeholder="Enter current password ..." class="form-control" name="email-user"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-11" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">New Password: </label>

                                    <div class="col-sm-9" style="margin-top: 10px; margin-left: -15px; width: 380px;">
                                        <input type="password" id="new" placeholder="Enter new password ..." class="form-control" name="password-user"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-11" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Confirm Password: </label>

                                    <div class="col-sm-9" style="margin-top: 10px; margin-left: -15px; width: 380px;">
                                        <input type="password" id="confirm" placeholder="Enter confirm password ..." class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div>

                            
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="change_user_id" name="user-id" value="{{Session::get('user_id')}}" />
                    <input type="hidden" id="current_pass" value="" />
                    <input type="hidden" id="new_pass" value="" />
                    <input type="hidden" id="confirm_pass" value="" />
                    <!-- <input type="hidden" id="role_id" value="" /> -->

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-info" type="submit" value="Edit" id="change_password" >

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="backend/bower_components/select2/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="backend/bower_components/select2/dist/css/select2.min.css">

</body>
</html>
