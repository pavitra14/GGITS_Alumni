<?php
include_once './includes/functions.php';
//This file does not contain any page code itself, it just calls the required file as per the requirements.
if(!logged_in()) {
    header('Location: login.php');
}

if(!empty($_GET['search'])) {
    getURLFromName('search', $_GET['search']);
}
if($_POST['profileUpdateBtn'] == 'Update') {
//    exit(json_encode($_POST));
    $post = $_POST;
    $status = updateProfile($post);
    if($status == true) {
        //Post successfull!
        echo '<script>alert("Updated.");</script>';
    } else {
        exit(json_encode($post));
    }
} elseif ($_POST['eventBtn'] == 'Add event') {
    $post = $_POST;
    $status = addEvent($post);
    if($status == true) {
        //event post successfull
        echo '<script>alert("Event added"); location.href = "index.html?profile=1"; </script>';
    }
}
//if-elseif statements to handle custom views.
//these are to be at the last.
if(!empty($_GET['profile'])){
    require_once 'views/profile.php';
}elseif (isset($_GET['view']) && $_GET['view'] != null) {
    require_once 'views/view.php';
}elseif ($_SESSION['authorized'] == true) {
    require_once 'views/feed.php';
}
