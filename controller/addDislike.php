<?php
session_start();

require_once ('../model/Viewer.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $viewer = new Viewer();
    $viewer->addDislike($_SESSION['id'],$_GET['postid']);
    header('location:../View/wall.php?');
}

?>