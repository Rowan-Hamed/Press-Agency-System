<?php
session_start();

if(!isset($_SESSION['id'])) {
    $_SESSION['message_Error'] = "please login first";
    header('Location: ../view/login.php');
    exit;
}


require_once ('../model/Viewer.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $viewer = new Viewer();
    $viewer->addLike($_SESSION['id'],$_GET['postid']);
    header('location:../View/wall.php?');

}

?>