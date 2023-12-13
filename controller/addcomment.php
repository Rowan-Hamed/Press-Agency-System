<?php
    session_start();
    require_once ('../model/db/DatabaseClass.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $parComment = isset($_POST['parComment'])? $_POST['parComment']: 'NULL';

        $sql =
        "
        INSERT INTO comments (postId, userId, comment, parentCommentId) VALUES ( '".$_POST['postID'] ."'
        ,'".$_SESSION['id'] .  " ',' " .$_POST['comment']. " ', ".$parComment.");
        ";
        $db = new database();
        $db->insert($sql);
        header('location:../View/comments.php?id='.$_POST['postID']);
    
    }
    else{
        header('location:../View/wall.php');
    }
?>