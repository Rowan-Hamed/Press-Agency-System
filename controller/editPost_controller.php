<?php
session_start();
require_once('../model/Editor.php');
$editor = new Editor();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $title = $_GET["title"];
    $content = $_GET["content"];
    $role = $_GET['Artical-role'];
    
    // Update the post
    $editor->updatePost($_GET['postId'], $title, $content, $role, $_GET['photoURl']);

    // Redirect after successful update
    header("Location:../View/history.php");
    exit();
} else {
    // Handle other HTTP methods or show an error message
    echo "Invalid request method";
}
?>
