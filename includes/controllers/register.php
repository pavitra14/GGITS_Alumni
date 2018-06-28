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
    $query = "INSERT INTO `user_details`(`u_id`, `username`, `password`, `fname`, `lname`, `email`, `session`, `course`, `startYear`, `endYear`) VALUES ('$u_id','$username','$password','$fname','$lname','$email', '$session', '$course', '$startYear', $endYear)";
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