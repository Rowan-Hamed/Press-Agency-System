
<?php
    session_start();
    require_once ('../model/db/DatabaseClass.php');
    $db = new database();

// ?postId=
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['postId'])) {
        $postId = $_GET['postId'];
        $userId = $_SESSION['id'];
        //check if he saved it before
            if($db->check("SELECT * FROM savedPost WHERE postId =". $_GET['postId']." AND userId =".$_SESSION['id'])==0){
                $db->insert("INSERT INTO savedPost (postId, userId) VALUES (".$_GET['postId'].",". $_SESSION['id'] . ");" );
            }
            else{
                $db->delete("DELETE FROM savedPost WHERE postId = ".$_GET['postId']." AND userId = ".$_SESSION['id']);
            }
        }
        header('location:../View/saved.php');
    }
    /*CREATE TABLE savedPost (
    postId INT,
    userId INT,*/
?>