<?php
session_start();

require_once('../model/db/DatabaseClass.php');
require_once('../model/Post.php');

if (isset($_POST['action']) && isset($_POST['postId'])) {
    $action = $_POST['action'];
    $postId = $_POST['postId'];

    $db = new Database();

    // Load the post based on postId
    $post = new Post($postId);

    if ($action === 'accept') {
        // Placeholder: Implement logic to mark the post as accepted
        $post->acceptPost();
    } elseif ($action === 'refuse') {
        // Placeholder: Implement logic to mark the post as refused
        $post->refusePost();
    }

    // Redirect to the page displaying requested news
    header("Location: display_requested_news.php");
    exit();
}

// Fetch data to display requested news
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
    <?php include("../assets/navBar/navBar.php"); ?>
    <main>
        <?php if (!empty($data)) { ?>
            <?php foreach ($data as $post) {
                $p = new Post($post['postId']);
            ?>
                <div class="main-feed">
                    <div class="feed-tweet">
                        <?php if (!empty($p->getOwnerPhoto())) { ?>
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
                            <?php if (!empty($p->getUrlToPhoto())) { ?>
                                <img style="width: ; height: auto; border-radius: 8px; margin-right: 12px" src="../assets/photos/postPhoto/<?php echo $p->getUrlToPhoto() ?>" alt="">
                            <?php } ?>
                            <div class="tweet-icons">
                                <!-- Add Accept and Refuse buttons -->
                                <button class="accept-btn" onclick="handlePostAction(<?php echo $p->getPostId(); ?>, 'accept')">Accept</button>
                                <button class="refuse-btn" onclick="handlePostAction(<?php echo $p->getPostId(); ?>, 'refuse')">Refuse</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            <?php } ?>
        <?php } ?>
    </main>

    <!-- Add JavaScript for handling button clicks -->
    <script>
        function handlePostAction(postId, action) {
            // Send an AJAX request to handle_post_action.php
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Redirect to the page displaying requested news
                        window.location.href = 'display_requested_news.php';
                    } else {
                        // Handle errors
                        console.error('Error:', xhr.statusText);
                    }
                }
            };

            xhr.open('POST', 'handle_post_action.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('postId=' + postId + '&action=' + action);
        }
    </script>
</body>
</html>
