<?php
/**
 * Created by PhpStorm.
 * User: Pavitra
 * Date: 6/28/2018
 * Time: 5:45 PM
 */
/*
 * @param POST
 * @return bool
 */
function updateProfile($post) {
    global $conn;
    $u_id = $post['u_id'];
    $curr_com = trim($post['curr_com']);
    $email = trim($post['email']);
    $curr_pos = trim($post['curr_pos']);
    $curr_loc = trim($post['curr_loc']);
    $curr_phn = trim($post['curr_phn']);
    $password = "";
    $sql = "";
    if($post['password'] != "") {
        $password = md5(trim($post['password']));
        $sql = "UPDATE `user_details` SET `password`='$password', `email`='$email',`curr_pos`='$curr_pos',`curr_com`='$curr_com',`curr_loc`='$curr_loc',`curr_phn`='$curr_phn' WHERE `u_id` = '$u_id'";
    } else {
        $sql = "UPDATE `user_details` SET `email`='$email',`curr_pos`='$curr_pos',`curr_com`='$curr_com',`curr_loc`='$curr_loc',`curr_phn`='$curr_phn' WHERE `u_id` = '$u_id'";
    }

//    exit(json_encode($sql));
    if(mysqli_query($conn, $sql)) {
        //post successful
        $_SESSION['arr_details']['email'] = $email;
        $_SESSION['arr_details']['curr_com'] = $curr_com;
        $_SESSION['arr_details']['curr_pos'] = $curr_pos;
        $_SESSION['arr_details']['curr_loc'] = $curr_loc;
        $_SESSION['arr_details']['curr_phn'] = $curr_phn;
        return true;
    } else {
        //die(mysqli_error($conn));
        return false;
    }
}

/**
 * @param $post
 * @return bool
 */
function addEvent($post) {
    global $conn;
    $u_id = $post['u_id'];
    $eventName = trim($post['eventName']);
    $eventDate = $post['eventDate'];
    $sql = "INSERT INTO `timeline`(`u_id`, `eventName`, `eventDate`) VALUES ('$u_id','$eventName','$eventDate')";
//   exit($sql);
    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}

/**
 * @param $u_id
 */
function getEvents($u_id, $mode = "profile") {
    global $conn;
    $sql = "SELECT * FROM `timeline` WHERE `u_id` = $u_id ORDER BY eventDate desc ";
    $result = mysqli_query($conn, $sql);
    while($e = mysqli_fetch_array($result)) {
        $btn = "<div class=\"timeline-footer\">
                                             <a class=\"btn btn-danger btn-xs\" onclick=\"deleteEvent('".$e['e_id']."')\">Delete</a>
                                            </div>";
        if($mode != "profile") {
            $btn = "";
        }
        echo "<!-- timeline item -->
                                    <li>
                                        <i class=\"fa fa-user bg-aqua\"></i>
                                        <div class=\"timeline-item\">
                                            <h3 class=\"timeline-header no-border\">
                                                ".$e['eventName']."
                                            </h3>
                                            ".$btn."
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class=\"time-label\">
                                        <span class=\"bg-green\">
                                          <script> var d = new Date('".$e['eventDate']."'); document.write(d.toDateString());</script>
                                        </span>
                                    </li>
                                    
                                    <!-- END timeline item -->";
    }
}

/**
 * @param $e_id
 * @return bool
 */
function delEvent() {
    global $conn;
    if(!empty($_POST['e_id'])) {
        $e_id = $_POST['e_id'];
        $query = "DELETE FROM timeline WHERE e_id='$e_id'";
        mysqli_query($conn,$query);
    }
}

function getFromView($w) {
    global $conn;
    $query = "SELECT * FROM user_details WHERE username='$w'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0) {
        //No such user exists. return null.
        return null;
    } else {
        $w_details = mysqli_fetch_array($result);
        return $w_details;
    }
}