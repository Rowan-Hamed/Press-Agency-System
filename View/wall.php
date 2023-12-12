<?php
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();

    require_once ('../model/db/DatabaseClass.php');
    require_once ('../model/Post.php');

    $db = new database();

    $data = $db->display("SELECT postId FROM post WHERE status = 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link href="../assets/css/wall.css" rel="stylesheet">
    <title>Press Agency</title>
</head>
<body>
<?php include("../assets/navBar/navBar.php"); ?> </br></br></br></br>
    <main>
        <?php if(!empty($data)) { ?>
        <?php foreach($data as $post) { 
            $p = new Post($post['postId']);
        ?>
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
                            <img src="../assets/photos/postPhoto/<?php echo $p->getUrlToPhoto() ?>" alt="">
                        <?php } ?>
                        <div class="tweet-icons">
                            <a href="" style="color: black; font-size: rem">
                            <span class="material-icons-outlined">
                                thumb_up
                            </span>
                            </a>
                            Likes: <?php echo $p->getLikesNum() ?>
                            <a href="" style="color: black; font-size: rem">
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
                            Views: <?php echo $p->getNumViews() ?>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            </br>
        <?php } }?>
    </main>

</body>
</html>