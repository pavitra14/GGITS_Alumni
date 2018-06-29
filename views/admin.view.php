<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 7/4/18
 * Time: 12:58 PM
 */
if($_SESSION['admin'] != true) {
    header('Location: index.html');
}
$arr_details = $_SESSION['arr_details'];
$gravurl = gravatar($arr_details['email']);
$fullname = $arr_details['fname'] . ' ' . $arr_details['lname'];
$fname = $arr_details['fname'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=SITE_TITLE?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/sc-1.5.0/datatables.min.css"/>
    <!--  Sliders  -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/jquery.dataTables.yadcf.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo LTE;?>dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo LTE;?>dist/css/skins/skin-black.css">
    <!-- Custom CSS sheet app.css -->
    <link rel="stylesheet" href="assets/css/app.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- jQuery 3 -->
    <script src="<?php echo LTE;?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Delete button -->
    <script src="./assets/js/like.js"></script>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><b>GGITS</b> Alumni</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search">
                            <input type="submit" value="Search" style="display: none;" id="searchSubmit">
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Feed <span class="sr-only">(current)</span></a></li>
                        <li><a href="?profile=1">My Profile</a></li>
                        <?=ifAdmin()?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Having any difficulty?<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>Feel free to reach us at :</li>
                                <li><a href="mailto:me@pbehre.in?subject=FarewellDab%20Contact&body=">me@pbehre.in</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?=$gravurl?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Hey, <?=$fname?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?=$gravurl?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?=$fullname?>
                                        <small>Session: <?=$arr_details['session']?></small>
                                        <small>User id - #<?=$arr_details['u_id']?></small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="row">
                                        <div class="col-xs-4 pull-left">
                                            <a href="?profile=1" class="btn btn-default btn-flat">Profile</a>
                                        </div>

                                        <div class="col-xs-4 pull-right">
                                            <a href="?logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Administrator Board
                    <small>Alumni</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Annoucements</h3>
                                    <div class="box-tools pull-right">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title">Announce something</h3>
                                                </div>
                                                <form class="form-horizontal" method="post">
                                                    <input type="hidden" name="from_id" value="<?=$arr_details['u_id']?>">
                                                    <div class="box-body">
                                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                                                            <textarea name="msg" id="content" cols="30" rows="10" placeholder="Content" required></textarea>
                                                    </div>
                                                    <div class="box-footer">
                                                        <input type="reset" value="Reset" class="btn btn-default">
                                                        <button type="submit" class="btn btn-info pull-right" name="announceBtn" value="1">Announce</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box box-secondary">
                                                <div class="box-header">
                                                    <h3 class="box-title">Previous Announcements</h3>
                                                </div>
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-hover" id="annoucements">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Author</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <? getPreviousAnnouncements();?>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Author</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Alumni Details</h3>
                                    <div class="box-tools pull-right">
                                        <!-- Collapse Button -->
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                    <div class="box-body">

                                            <div class="box box-info">
                                            <div class="box-body table-responsive">
                                                <table class="table table-hover" id="filterAlumni">
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Course</th>
                                                            <th>Joining Year</th>
                                                            <th>Passing Year</th>
                                                            <th>Position</th>
                                                            <th>Company</th>
                                                            <th>Location</th>
                                                            <th>Branch</th>
                                                            <th>College</th>
                                                            <th>Profile</th>
                                                        </tr>
                                                    </thead>
                                                    <? getAlumniDetails(); ?>
                                                    <tfoot>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Course</th>
                                                        <th>Joining Year</th>
                                                        <th>Passing Year</th>
                                                        <th>Position</th>
                                                        <th>Company</th>
                                                        <th>Location</th>
                                                        <th>Branch</th>
                                                        <th>College</th>
                                                        <th>Profile</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer feed-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?=SITE_VERSION?>
            </div>
            <strong><?=SITE_FOOTER?></strong>
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo LTE;?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo LTE;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo LTE;?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo LTE;?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- CK Editor -->
<script src="<?php echo LTE;?>bower_components/ckeditor/ckeditor.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/sc-1.5.0/datatables.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="./assets/js/jquery.dataTables.yadcf.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo LTE;?>dist/js/adminlte.min.js"></script>
<script src="assets/js/manup.js"></script>
<!-- Type Ahead search -->
<script src="./assets/js/typeahead.min.js"></script>
<script src="./assets/js/search.js"></script>
<script src="./assets/js/tables.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('content');
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.extraAllowedContent = 'span i';
        //bootstrap WYSIHTML5 - text editor
        // $('.textarea').wysihtml5()
        $('#annoucements').DataTable();
    })
</script>
</body>
</html>
