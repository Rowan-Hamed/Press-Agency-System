<?php
session_start();
require_once ('../model/Admin.php');
$admin = new Admin();

if (isset($_GET['id'])) {
    $admin->deleteUser($_GET['id']);
    header('location:..\View\usersList.php');
}
?>