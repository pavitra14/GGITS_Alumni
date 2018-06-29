<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 7/4/18
 * Time: 5:23 PM
 */

function registerUser($post) {
    global $conn;
    $u_id = genID();
    $username = trim($post['user']);
    $password = md5(trim($post['pass']));
    $fname = trim($post['fname']);
    $lname = trim($post['lname']);
    $email = trim($post['email']);
    $course = trim($post['course']);
    $session = $post['session'];
    $temp = explode('-',$session);
    $startYear = $temp[0];
    $endYear = $temp[1];
    $curr_pos = $post['curr_pos'];
    $curr_com = $post['curr_com'];
    $curr_loc = $post['curr_loc'];
    $curr_phn = $post['curr_phn'];
    $branch = $post['branch'];
    $college = $post['college'];
    $query = "INSERT INTO `user_details`
(`u_id`, `username`, `password`, `fname`, `lname`, `email`, `session`, `course`, `startYear`, `endYear`, `curr_pos`, `curr_com`,`curr_loc`, `curr_phn`, `branch`, `college`)
 VALUES ('$u_id','$username','$password','$fname','$lname','$email', '$session', '$course', '$startYear', '$endYear', '$curr_pos', '$curr_com', '$curr_loc', '$curr_phn', '$branch', '$college')";
    if(mysqli_query($conn, $query)) {
        //Registration Successfull
        mailNewAccount($email,$fname,$username, $u_id);
        echo '<script>alert("Registration Successful, You may now login.");</script>';
        $_SESSION['success'] ="Registration Successful, You may now login.";
        header('Location: login.html');
        exit();
    } else {
//        $_SESSION['error'] = "Registrations are closed right now :(";
        $_SESSION['error'] = mysqli_error($conn);
    }

}

/**
 * @param string $username
 * @return bool
 */
function userExists($username){
    global $conn;
    $sql = "SELECT * FROM `user_details` WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param $email
 * @return bool
 */
function emailExists($email){
    global $conn;
    $sql = "SELECT * FROM `user_details` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}