<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 7/4/18
 * Time: 10:48 PM
 */
$view = $_GET['view'];
$v_details = getFromView($view);
$v_gravurl = gravatar($v_details['email']);
$v_fullname = $v_details['fname'] . ' ' . $v_details['lname'];
$v_fname = $v_details['fname'];
if(!logged_in()) {
    $_SESSION['error'] = "You need to login first.";
    $_SESSION['redirect'] = $w;
    header('Location: ../login.html');
    exit();
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
    <title><?=$fullname?> | Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo LTE;?>bower_components/Ionicons/css/ionicons.min.css">
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
    <!-- Like button -->
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
                        <li class="active"><a href="index.html">Feed </a></li>
                        <li><a href="?profile=1">My Profile <span class="sr-only">(current)</span></a></li>
                        <?=ifAdmin()?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Having any difficulty?<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>Feel free to reach us at :</li>
                                <li><a href="mailto:me@pbehre.in?subject=GGITSAlumni%20Contact&body=">me@pbehre.in</a></li>
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
                                        <div class="col-sm-4 pull-left">
                                            <a href="?profile=1" class="btn btn-default btn-flat">Profile</a>
                                        </div>

                                        <div class="col-sm-4 pull-right">
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
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?=$v_gravurl?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?=$v_fullname?></h3>

                            <p class="text-muted text-center">Session: <?=$v_details['session']?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right" href="mailto:<?=$v_details['email']?>"><?=$v_details['email']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b> <a href="tel:<?=$v_details['curr_phn']?>" class="pull-right"><?=$v_details['curr_phn']?></a>
                                </li>
                            </ul>
                            <a href="mailto:<?=$v_details['email']?>" class="btn btn-primary btn-block"><b>Ping!</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                            <p class="text-muted">
                                <?=$v_details['course']?> in <?=$v_details['branch']?> from <?=$v_details['college']?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted"><?=$v_details['curr_loc']?></p>

                            <hr>

                            <strong><i class="fa fa-user-md margin-r-5"></i> Job</strong>

                            <p><?=$v_details['curr_pos']?></p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li><a href="#profile" data-toggle="tab">Profile</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="profile">
                                <form class="form-horizontal" method="post">
                                    <input type="hidden" name="u_id" value="<?=$v_details['u_id']?>">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Current Company</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="curr_com" placeholder="Company" value="<?=$v_details['curr_com']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?=$v_details['email']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Current Position</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="curr_pos" placeholder="Current Position" value="<?=$v_details['curr_pos']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Current Location</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="curr_loc" placeholder="Current Location" disabled><?=$v_details['curr_loc']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Phone.</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" name="curr_phn" placeholder="Phone" value="<?=$v_details['curr_phn']?>" disabled>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse" id="timeline">
                                    <? getEvents($v_details['u_id'], 'view');?>
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                                <br>

                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->

                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
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
<!-- AdminLTE App -->
<script src="<?php echo LTE;?>dist/js/adminlte.min.js"></script>
<script src="assets/js/manup.js"></script>
<!-- Type Ahead search -->
<script src="./assets/js/typeahead.min.js"></script>
<script src="./assets/js/search.js"></script>
</body>
</html>

