<?php
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();
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
    <?php include ("../assets/navBar/navBar.php"); ?>
    <main>
        <div class="main-feed">
            <div class="feed-tweet">
                <img class="tweet-img" src="../assets/photos/profilePhoto/1.png" alt="">
                <div class="feed-tweet-details">
                    <div class="tweeter-details">
                        <a href="" class="tweeter-name">Owner name</a>
                    </div>
                    <div class="tweet-text">
                        <p>Hello brothers</p>
                    </div>
                    <img src="../assets/photos/postPhoto/post1.jpg" alt="">
                    <div class="tweet-icons">
                        <a href="" style="color: black; font-size: rem">
                        <span class="material-icons-outlined">
                            thumb_up
                        </span>
                        </a>
                        Likes: 10
                        <a href="" style="color: black; font-size: rem">
                            <span class="material-icons-outlined">
                                thumb_down
                            </span>
                        </a>
                        Disikes: 5
                        <a href="" style="color: black; font-size: rem">
                            <span class="material-icons-outlined">
                                chat_bubble
                            </span>
                        </a>
                        Views: 12
                    </div>
                </div>
            </div>
        </div>
        </br>
        </br>
    </main>

</body>
</html>