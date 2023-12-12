<?php
session_start();
require_once ('../model/Admin.php');
$admin = new Admin();

if (isset($_GET['id'])) {
    $admin->deletePost($_GET['id']);
    header('location:..\View\wall.php');
}
?>