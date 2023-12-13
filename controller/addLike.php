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
    if(isset($_GET['loc']))
        header('location:../View/'.$_GET['loc'].'?id='.$_GET['postid']);
    else
        header('location:../View/wall.php?');

}

?>