<?php
/**
 * Created by PhpStorm.
 * User: pavitra14
 * Date: 13/4/18
 * Time: 11:21 PM
 * purpose - This file will handle all the feed related ajax queries
 */
include_once 'functions.php';
if(!empty($_GET['like'])) {
    like();
}elseif(!empty($_GET['search_key'])) {
    search();
}elseif(!empty($_GET['full_name'])){
    getURLFromName('ajax');
}elseif(!empty($_GET['delete'])){
    deletePost();
}elseif(!empty($_GET['deleteEvent'])){
    delEvent();
}elseif(!empty($_POST['userExist'])) {
    $status = userExists(trim($_POST['userExist']));
//    die("user");
    if(trim($_POST['userExist']) == ''){
        echo "<div class=\"alert alert-danger\"> Invalid Username</div>";
    }elseif($status == true) {
        echo "<div class=\"alert alert-danger\"> Username already exist. </div> <script>$('#submitR').prop('disabled', true);</script>";
    } elseif($status == false) {
        echo "<div class=\"alert alert-success\"> Username available </div> <script>$('#submitR').prop('disabled', false);</script>";
    }
}elseif(!empty($_POST['emailExist'])) {
    $status = emailExists(trim($_POST['emailExist']));
    if(trim($_POST['emailExist']) == ''){
        echo "<div class=\"alert alert-danger\"> Invalid Email</div>";
    }elseif($status == true) {
        echo "<div class=\"alert alert-danger\"> Email already exist. </div> <script>$('#submitR').prop('disabled', true);</script>";
    } elseif($status == false) {
        echo "<div class=\"alert alert-success\"> Email available </div> <script>$('#submitR').prop('disabled', false);</script>";
    }
} elseif(!empty($_GET['feed']) || $_GET['feed'] == '1' || $feed == true) {
    getFeed();
}