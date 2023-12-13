<?php
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();

    require_once ('../model/db/DatabaseClass.php');
    require_once ('../model/Post.php');

    $db = new database();


    $type = isset($_GET['type']) ? $_GET['type'] : '';
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");

    $data = $db->display("SELECT postId FROM post WHERE status = 1 AND postType LIKE '%$type%' AND creationTime >= '$date'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="../assets/css/wall.css" rel="stylesheet">
    <title>Press Agency</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            display: inline-block;
            text-align: left;
            width: 100%;
            height: 15%;    
        }

        input, select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        select {
            cursor: pointer;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="date"] {
            appearance: none;
            padding: 10px;
        }
        form{
            display: flex;
            margin-left: 0;
            margin-top: -20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include("../assets/navBar/navBar.php"); ?>
    <div class="hah">
    <form action="./wall.php" method="get">
        <input type="date"  name="date" value="<?php echo date('Y-m-d', strtotime($date)) ?>">
        <select name="type">
            <?php
            echo '<option value="" '. (empty($type)? 'selected': '') .' >Choose All Types</option>';
            $postTypes = ['Sport', 'Cinema', 'Social', 'Political', 'Scientific', 'Economic', 'Health'];

            foreach ($postTypes as $t) {
                $selected = ( strtolower($type) === strtolower($t)) ? 'selected' : '';
                echo "<option $selected value=\"$t\">$t</option>";
            }

            ?>
        </select>
        <input type="search" name="search" placeholder="Enter Editor name" value="<?php echo $search ?>">
        <button type="submit" value="Search"><span style="width:40px" class="material-symbols-outlined">
search
</span></button>
    </form>
    </div>

    <main>
        <?php if(!empty($data)) { ?>
        <?php foreach($data as $post) { 
            $p = new Post($post['postId']);
            if(strpos(strtolower($p->getOwner()), strtolower($search)) === false) continue;
        ?>
            <div class="main-feed">
                <div class="feed-tweet">
                    <?php if(!empty($p->getOwnerPhoto())) { ?>
                        <img class="tweet-img" src="../assets/photos/profilePhoto/<?php echo $p->getOwnerPhoto() ?>" alt="">
                    <?php } ?>
                    <div class="feed-tweet-details">
                        <div class="tweeter-details">
                            <a href="./history.php?id=<?php echo $p->getOwnerId() ?>" class="tweeter-name"><?php echo $p->getOwner() ?></a>
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
                            <a href="../controller/addLike.php?postid=<?php echo $p->getPostId() ?>&loc=wall.php" style="color: black; font-size: rem">
                            <span class="material-icons-outlined">
                                thumb_up
                            </span>
                            </a>
                            Likes: <?php echo $p->getLikesNum() ?>
                            <a href="../controller/addDislike.php?postid=<?php echo $p->getPostId() ?>&loc=wall.php" style="color: black; font-size: rem">
                                <span class="material-icons-outlined">
                                    thumb_down
                                </span>
                            </a>
                            Disikes: <?php echo $p->getDislikesNum() ?>
                            <a href="./comments.php?id=<?php echo $p->getPostID() ?>" style="color: black; font-size: rem">
                                <span class="material-icons-outlined">
                                    chat_bubble
                                </span>
                            </a>
                            <a href="../controller/savedPost.php?postId=<?php echo $p->getPostID() ?>" style="color: black; font-size: rem">
                            <span class="material-symbols-outlined">
                                hotel_class
                            </span>
                            </a>
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