<?php
session_start();

if(!isset($_SESSION['userType']) || strtolower($_SESSION['userType']) !== "admin" || !isset($_POST['id'])){
    header("Location: ../view/login.php");
}

require_once ('../model/Admin.php');

$user = new Admin();

$user->refusePost($_POST['id']);


header("Location: ../view/requestedNews.php");
exit;
?>