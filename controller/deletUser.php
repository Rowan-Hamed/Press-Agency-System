<?php
session_start();
require_once ('../model/Admin.php');
$admin = new Admin();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $admin->deleteUser($_GET['id']);
    header('location:..\View\usersList');
}
else{
    echo 'a7a';
}
?>