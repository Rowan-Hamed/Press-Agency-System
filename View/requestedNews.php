<?php
session_start();

if(!isset($_SESSION['userType']) || strtolower($_SESSION['userType']) !== "admin"){
    header("Location: login.php");
}
require_once ('../model/db/DatabaseClass.php');
require_once ('../model/Post.php');
$db = new Database();
$data = $db->display("SELECT postId FROM post WHERE status = 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link href="../assets/css/wall.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        .accept-btn, .refuse-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .refuse-btn {
            background-color: #f44336;
        }
    </style>
    <title>Requested News</title>
</head>
<body>
    <?php include("../assets/navBar/navBar.php");
        if(empty($data)) {
            echo "<h1 style='text-align: center;'>There is no news";
        }
        ?>
    <main>
        <?php if (!empty($data)) { ?>
            <?php foreach ($data as $post) {
                $p = new Post($post['postId']);
            ?>
                <div class="main-feed">
                    <div class="feed-tweet">
                        <?php if (!empty($p->getOwnerPhoto())) { ?>
                            <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $p->getOwnerPhoto() ?>" alt="">
                        <?php } else {?>
                            <img class="tweet-img" src="../assets/photos/style/unknown_person.jpg" alt="">
                        <?php }?>
                        <div class="feed-tweet-details">
                            <div class="tweeter-details">
                                <a href="" class="tweeter-name"><?php echo $p->getOwner() ?></a>
                                <h5 href="" class="tweeter-name"><?php echo $p->getCreationTime() ?></h5>
                            </div>
                            <div class="tweet-text">
                                <h6><?php echo $p->getTitle() ?></h6>
                                <p><?php echo $p->getBody() ?></p>
                            </div>
                            <?php if (!empty($p->getUrlToPhoto())) { ?>
                                <img style="width: 90%; height: auto; border-radius: 8px; margin-right: 12px" src="../assets/photos/postPhoto/<?php echo $p->getUrlToPhoto() ?>" alt="">
                            <?php } ?>
                            <div class="tweet-icons">
                            <form action="../controller/acceptPost.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $p->getPostID() ?>">
                                <button class="accept-btn">Accept</button>
                            </form>
                            <form action="../controller/refusePost.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $p->getPostID() ?>">
                                <button class="refuse-btn" >Refuse</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            <?php } ?>
        <?php } ?>
    </main>
        
</body>
</html>
