<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 7/4/18
 * Time: 12:58 PM
 */
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
    <!-- Dynamic Feed -->
    <script src="./assets/js/feed.js"></script>
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
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Annoucement Board
                    <small>Feed</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box box-primary">
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-flat" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <div class="box-body">
                            This platform is still in beta stage and 
                        </div>
                    </div>
                </div>
                <div id="feedContent">
                    <?php
                    include 'includes/feedContent.php';
                    ?>
                </div>
                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <div id="scroll-end">No new posts!</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="loader-icon"><i class="fa fa-spinner fa-spin"></i></div>
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
<!-- AdminLTE App -->
<script src="<?php echo LTE;?>dist/js/adminlte.min.js"></script>
<script src="assets/js/manup.js"></script>
<!-- Type Ahead search -->
<script src="./assets/js/typeahead.min.js"></script>
    <script src="./assets/js/search.js"></script>
</body>
</html>
