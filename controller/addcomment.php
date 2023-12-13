<?php
    session_start();
    require_once ('../model/db/DatabaseClass.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql =
        "
        INSERT INTO comments (postId, userId, comment, parentCommentId) VALUES ( '".$_POST['postID'] ."'
        ,'".$_SESSION['id'] .  " ',' " .$_POST['comment']. " ', NULL);
        ";
        $db = new database();
        $db->insert($sql);
        header('location:../View/comments.php?id='.$_POST['postID']);
    
    }
    else{
        header('location:../View/wall.php');
    }
?>