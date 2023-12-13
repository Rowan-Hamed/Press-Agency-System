<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$id = isset($_SESSION['id'])? $_SESSION['id']: 0;
if(isset($_GET['id']))
  $id = $_GET['id'];

require_once ('../model/db/DatabaseClass.php');
$db = new database();

$sql = "SELECT * FROM users WHERE id = $id";

$userData = $db->select($sql);

if(!$userData) {
  $_SESSION['message_Error'] = "please login first";
  header('Location: login.php');
  exit();
}

$fname = $userData['fname'];

$lname = $userData['lname'];

$email = $userData['email'];

$phoneNum = $userData['phoneNum'];

$urlToPhoto = $userData['urlToPhoto'];

require_once('../model/Post.php');

$data = $db->display("SELECT postId FROM post WHERE ownerId = $id");
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
<?php include("../assets/navBar/navBar.php"); ?>
<main>
    <?php if (!empty($data)) { ?>
        <?php foreach ($data as $post) {
            $p = new Post($post['postId']);
            $color = 'rgba(170, 82, 82, 0.548)';
            if($p->getStatus() == 1)
                $color = 'rgba(82, 170, 110, 0.548)';
            else if($p->getStatus() == 0)
                $color = 'background-color:rgba(48, 63, 75, 0.548)';
            ?>
            <div class="main-feed" style="background-color: <?php echo $color?>">
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
                            <a href="../controller/deletePost.php?id=<?php echo $p->getPostId(); ?>" style="color: red; font-size: 1rem;"
                               onclick="return confirm('Are you sure you want to delete this post?')">
                                <span class="material-icons-outlined">
                                    delete
                                </span>
                            </a>
                            <a href="../View/editPost.php?postId=<?php echo $p->getPostId(); ?>" style="color: blue; font-size: 1rem;">
                                <span class="material-icons-outlined">
                                    edit
                                </span>
                            </a>
                            <!-- ... other icons ... -->
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        <?php } ?>
    <?php } ?>
</main>
</body>
</html>
