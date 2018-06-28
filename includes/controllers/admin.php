<?php
/**
 * Created by PhpStorm.
 * User: Pavitra
 * Date: 6/28/2018
 * Time: 9:47 PM
 */
/**
 * @param $post
 * @return bool
 */
function msgPost($post, $from_name) {
    global $conn;
    $p_id = genID();
    $from_id = $post['from_id'];
    $title = $post['title'];
    $msg = $post['msg'];
    $date_created = date("Y-m-d H:i:s");// 2001-03-10 17:16:18 (the MySQL DATETIME format)
    $likes = 0;
    $msg = escape($msg);
    $query = "INSERT INTO `posts`(`p_id`, `from_id`, `title`, `msg`, `date_created`, `likes`) VALUES ('$p_id','$from_id','$title','$msg','$date_created','$likes')";
    if(mysqli_query($conn, $query)) {
        //post successful
        $sql = "SELECT email, fname FROM `user_details` WHERE isAdmin = 0";
        $result = mysqli_query($conn, $sql);
        while($m = mysqli_fetch_array($result)) {
            mailNewPost($m['email'],$from_name, $m['fname']);
        }
        return true;
    } else {
        //die(mysqli_error($conn));
        return false;
    }
}
function getPreviousAnnouncements() {
    global $conn;
    $sql = "SELECT * FROM `posts` ORDER BY `date_created` desc";
    $result = mysqli_query($conn,$sql);
    while($q = mysqli_fetch_array($result)) {
        $arr_user = getUserFromUID($q['from_id']);
        $fullName = $arr_user['fname'] . ' ' . $arr_user['lname'];
        echo "<tr>";
        echo "<td>".$q['title']."</td>";
        echo "<td>".$fullName."</td>";
        echo "<td><a href='#' onclick='deletePost(".$q['p_id'].")' class='btn btn-flat btn-xs btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function getAlumniDetails() {
    global $conn;
    $sql = "SELECT * FROM `user_details`";
    $result = mysqli_query($conn, $sql);
    while($q = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$q['fname']."</td>";
        echo "<td>".$q['lname']."</td>";
        echo "<td>".$q['course']."</td>";
        echo "<td>".$q['startYear']."</td>";
        echo "<td>".$q['endYear']."</td>";
        echo "<td>".$q['curr_pos']."</td>";
        echo "<td>".$q['curr_com']."</td>";
        echo "<td>".$q['curr_loc']."</td>";
        echo "<td>".$q['branch']."</td>";
        echo "<td>".$q['college']."</td>";
        echo "<td><a href='index.html?view=".$q['username']."' class='btn btn-flat btn-info' target='_blank'>Open</a></td>";
        echo "</tr>";
    }
}