<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 7/4/18
 * Time: 12:16 PM
 */
include('./includes/functions.php');
if(logged_in()){
    header('Location: front.html');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=SITE_TITLE?> | Register</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo LTE;?>plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        /* MESSAGES */

        .hidethis {
            cursor: pointer;
        }

        .msg-info,
        .msg-atten,
        .msg-ok,
        .msg-error {
            margin: 3px 0;
            padding: 10px 10px 10px 40px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        .msg-info {
            background: #ADC2F7 6px center no-repeat;
            border: 1px solid #6D94F7;
            color: #03C;
        }

        .msg-atten {
            background: #FAE673 6px center no-repeat;
            border: 1px solid #FEBD63;
            color: #C60;
        }

        .msg-ok {
            background: #AEE893 6px center no-repeat;
            border: 1px solid #8EC46C;
            color: #060;
        }

        .msg-error {
            background: #F4B8B5 6px center no-repeat;
            border: 1px solid #C94042;
            color: #900;
        }
        /* END OF MESSAGES */
        .site-wrapper {
            display: table;
            width: 100%;
            height: 100%;
            /* For at least Firefox */
            min-height: 100%;
            background: rgba(48, 53, 70, 0.5);
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="site-wrapper">
    <div class="login-box">
    <!--    <div class="login-logo">-->
    <!--        FarewellDab-->
    <!--    </div>-->
        <?php
        if ( $_POST[ 'submitR' ] == "1") {
            registerUser($_POST);
        }
        ?>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Register</p>
            <p>
                <?php echo messages();?>
            </p>
            <form action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="user" id="username" class="form-control" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <div id="userExist"></div>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div id="emailExist"></div>
                </div>
                <div class="form-group has-feedback">
                    <select name="course" id="course" class="form-control" required>
                        <option value="" disabled selected>Select your course</option>
                        <option value="B.Tech">B.Tech</option>
                        <option value="B.E.">B.E.</option>
                        <option value="M.B.A.">M.B.A.</option>
                        <option value="M.Tech">M.Tech</option>
                        <option value="M.C.A">M.C.A</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <select name="session" id="session" class="form-control">
                        <option value="" disabled selected>Session</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="curr_pos" class="form-control" placeholder="Current Job Position(If any/NA)" required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="curr_com" class="form-control" placeholder="Current Company(If any/NA)" required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <textarea name="curr_loc" id="curr_loc" cols="30" rows="5" placeholder="Current Address/Locations" class="form-control"></textarea>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="curr_phn" class="form-control" placeholder="Current Phone no." required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select name="branch" id="branch" class="form-control">
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EE">EE</option>
                        <option value="ME">ME</option>
                        <option value="EX">EX</option>
                        <option value="MCA">MCA</option>
                        <option value="Civil">Civil</option>
                        <option value="IT">IT</option>
                        <option value="Applied Sciences">Applied Sciences</option>
                        <option value="MBA">MBA</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <select name="college" id="college" class="form-control">
                        <option value="Gyan Ganga Institute of Technology and Sciences">Gyan Ganga Institute of Technology and Sciences</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-5 pull-right">
                        <button type="submit" class="btn btn-danger btn-block btn-flat" name="submitR" value="1" id="submitR">Get on board!</button>
                    </div>
                    <!-- /.col -->
                </div>
                <a href="#" onclick="alert('Feature will be available soon!');">I forgot my password</a>
            </form>


            <br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</div>
<!-- jQuery 3 -->
<script src="<?php echo LTE;?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo LTE;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo LTE;?>plugins/iCheck/icheck.min.js"></script>
<script src="assets/js/manup.js"></script>
<script>
    var gap = 4;
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        var date = new Date();
        var startYear = 2003;
        var endYear = date.getFullYear() - gap;
        for(var i = startYear; i<=endYear; i++) {
            var sy = i;
            var ey = i+gap;
            var sess = sy + "-" + ey;
            $('#session').append($('<option>', {
                value: sess,
                text: sess
            }));
        }
    });
    $(document).ready(function() {
        var x_timer;
        $("#username").keyup(function (e){
            clearTimeout(x_timer);
            var user_name = $(this).val();
            x_timer = setTimeout(function(){
                console.log("checking user");
                check_username_ajax(user_name, "#userExist");
            }, 1000);
        });
        $("#email").keyup(function (e){
            clearTimeout(x_timer);
            var user_name = $(this).val();
            x_timer = setTimeout(function(){
                console.log("checking email");
                check_email_ajax(user_name, "#emailExist");
            }, 1000);
        });

        function check_username_ajax(username, feedback){
            $(feedback).html('Checking...<i class="fa fa-spinner"></i>');
            $.post('includes/feedContent.html', {'userExist':username}, function(data) {
                $(feedback).html(data);
            });
        }
        function check_email_ajax(username, feedback){
            $(feedback).html('Checking...<i class="fa fa-spinner"></i>');
            $.post('includes/feedContent.html', {'emailExist':username}, function(data) {
                $(feedback).html(data);
                console.log(data);
            });
        }
    });
</script>

</body>
</html>

