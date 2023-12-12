<?php
session_start();
require_once ('../model/Editor.php');
$editor = new Editor();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $postType = $_POST["postType"];
    $editorId =$_SESSION['id'];

    $postId = $editor->addPost($title,$content,0,$postType,$editorId,'');
    if(isset($_FILES['urlToPhoto'])) {
        $image_type = strtolower(pathinfo(basename($_FILES['urlToPhoto']["name"]), PATHINFO_EXTENSION));
        $post_image = $postId . '.' . $image_type;
        move_uploaded_file($_FILES["urlToPhoto"]["tmp_name"], "../assets/photos/postPhoto/" . $post_image);
        $editor->updatePost($postId,$title,$content,0,$postType, $post_image);
    }
}
header("Location:../View/addPost.php");
exit();
?>
