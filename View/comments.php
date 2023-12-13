<?php 
    session_start();
    require_once ('../model/Post.php');
    require_once ('../model/User.php');
    require_once ('../model/db/DatabaseClass.php');
    $post;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $db = new database();
        $post = new Post($_GET['id']);
        $sql = "SELECT * FROM `comments` WHERE postId =" . $_GET['id'] .";";
        $commentsData = $db->display($sql);
        
    }
    else{
        header('location:./wall.php');
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Comments Section</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/comments.css" />

    </head>
    <body>



    <?php include("../assets/navBar/navBar.php"); ?>
    <?php $p = new Post($_GET['id']); ?> 
    <div class="main-feed">
                <div class="feed-tweet">
                    <?php if(!empty($p->getOwnerPhoto())) { ?>
                        <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $p->getOwnerPhoto() ?>" alt="">
                    <?php } ?>
                    <div class="feed-tweet-details">
                        <div class="tweeter-details">
                            <a href="" class="tweeter-name"><?php echo $p->getOwner() ?></a>
                            <h5 href="" class="tweeter-name"><?php echo $p->getCreationTime() ?></h5>
                        </div>
                        <div class="tweet-text">
                            <h6><?php echo $p->getTitle() ?></h6>
                            <p><?php echo $p->getBody() ?></p>
                        </div>
                        <?php if(!empty($p->getUrlToPhoto())) { ?>
                            <img style="width: 90%; height: auto; border-radius: 8px; margin-right: 12px" src="../assets/photos/postPhoto/<?php echo $p->getUrlToPhoto() ?>" alt="">
                        <?php } ?>
                        <div class="tweet-icons">
                            <a href="../controller/addLike.php?postid=<?php echo $p->getPostId() ?>&loc=comments" style="color: black; font-size: rem">
                            <span class="material-icons-outlined">
                                thumb_up
                            </span>
                            </a>
                            Likes: <?php echo $p->getLikesNum() ?>
                            <a href="../controller/addDislike.php?postid=<?php echo $p->getPostId() ?>&loc=comments" style="color: black; font-size: rem">
                                <span class="material-icons-outlined">
                                    thumb_down
                                </span>
                            </a>
                            Disikes: <?php echo $p->getDislikesNum() ?>
                            <a href="" style="color: black; font-size: rem">
                                <span class="material-icons-outlined">
                                    chat_bubble
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



<!-- dd comment -->
<div class="main-feed">
    <div class="comment-form">
        <form action="../controller/addcomment.php" method="POST">
        <label for="comment">
        <input type="hidden" name="postID" value="<?php echo $_GET['id'] ;?>">
        <?php if(!empty($_SESSION['urlToPhoto'])) { ?>
                        <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $_SESSION['urlToPhoto'] ?>" alt="">
                    <?php } ?>
                    <div class="feed-tweet-details">
                            <a  class="tweeter-name"><?php echo $_SESSION['fname'].' ',$_SESSION['lname'] ?></a>
    </label>
    <textarea id="comment" name="comment" rows="4" placeholder="Type your comment here..."></textarea>
    <button type="submit">Submit Comment</button>
        </form>
        </div>
        </div>
    </div>




<?php 
    if(!empty($commentsData))
    foreach($commentsData as $comment){
        $sql ="SELECT fname,lname FROM users WHERE id=". $comment['userId'];
        $userName = $db->select($sql);
    ?> 
    <div class="main-feed">
                <div class="feed-tweet">
                    <?php if(!empty($p->getOwnerPhoto())) { ?>
                        <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $p->getOwnerPhoto() ?>" alt="">
                    <?php } ?>
                    <div class="feed-tweet-details">
                        <div class="tweeter-details">
                            <a href="" class="tweeter-name"><?php echo $userName['fname'].' ',$userName['lname'] ?></a>
                        </div>
                        <div class="tweet-text">
                            <h6 style="color: black;"><?php echo $comment['comment'] ?></h6>
                        </div>

                        <div class="tweet-icons">

                            <a href="" style="color: black; font-size: rem" >
                                <span class="material-icons-outlined" onclick="
                                
                                ">
                                    chat_bubble
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-feed">
    <div class="comment-form" style="; " id=<?php echo $counter ; $counter=$counter+1; ?>>
        <form action="../controller/addcomment.php" method="POST">
        <label for="comment">
        <input type="hidden" name="postID" value="<?php echo $_GET['id'] ;?>">
        <?php if(!empty($_SESSION['urlToPhoto'])) { ?>
                        <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $_SESSION['urlToPhoto'] ?>" alt="">
                    <?php } ?>
                    <div class="feed-tweet-details">
                            <a  class="tweeter-name"><?php echo $_SESSION['fname'].' ',$_SESSION['lname'] ?></a>
    </label>
    <textarea id="comment" name="comment" rows="4" placeholder="Type your comment here..."></textarea>
    <button type="submit">Submit Comment</button>
        </form>
        </div>
        </div>
    </div>
    <?php
    }
    ?>
    </body>
</html>