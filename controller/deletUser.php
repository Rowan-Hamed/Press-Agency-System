<?php
session_start();
require_once ('../model/Admin.php');
$admin = new Admin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin->deleteUser($_POST['userId']);
    header('location:..\View\usersList.php');
}
?>