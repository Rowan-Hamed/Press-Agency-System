<?php
session_start();

if(!isset($_SESSION['userType']) || strtolower($_SESSION['userType']) !== "admin"){
    header("Location: login.php");
}

require_once ('../model/db/DatabaseClass.php');

$db = new database();

$users = $db->display("SELECT * FROM users");

$search = "";
$id = "0";

if(isset($_GET["search"])){
    $search = $_GET["search"];
}

foreach($users as $user){
    if(strpos(strtolower($user['fname'] . ' ' . $user['lname']), strtolower($search)) === false){
        $index = array_search($user, $users);
        unset($users[$index]);
    }
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
if($id === "1"){
    usort($users, function($a, $b) {
        return $a['fname'] . ' ' . $a['lname'] < $b['fname'] . ' ' . $b['lname'];
    });
}
else if ($id === "2"){
    usort($users, function($a, $b) {
        return $a['fname'] . ' ' . $a['lname'] > $b['fname'] . ' ' . $b['lname'];
    });
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>users List</title>
        <link rel="stylesheet" href="../assets/css/usersList.css">
        <meta charset="UTF-8">
    </head>

    <body>
    <?php include("../assets/navBar/navBar.php");?>

    <div class="Table-container">
    <br>
    <form method="get" class="search" id="form">
        <div id="searchBar">
            <label for="id" hidden>id</label>
            <input id ="id" hidden name="id" value="<?php echo $id?>">
            <label for="search">Search: </label>
            <input style="color: black" id="search" type="search" name="search" value="<?php echo $search?>">
            <input type="submit" class='btn' value="search">
        </div>
    </form><br>
    
    <?php if(!empty($users)) { ?>
            <ul class="tablelist">
            <li class="table-header">
                <div class="col col-1">name</div>
                <div class="col col-2">phone</div>
                <div class="col col-3">role</div>
                <div class="col col-4">
                    <a href="?id=1&search=<?php echo $search?>"><img class="sort" src="../assets/photos/style/U.png" title="A-Z"></a>
                </div>
                
                <div class="col col-5">
                    <a href="?id=2&search=<?php echo $search?>"><img class="sort" src="../assets/photos/style/D.png" title="Z-A"></a>
                </div>
            </li>
        <?php foreach($users as $user) {
            if(strtolower($user['userType']) === "admin") continue;
            ?>
                <li class="table-row">
                    <div class="col col-1"><?php echo $user['fname'] . ' ' . $user['lname'] ?></div>
                    <div class="col col-2"><?php echo $user['phoneNum'] ?></div>
                    <div class="col col-3"><?php echo $user['userType'] ?></div>
                    <form action="../controller/deletUser.php" method="post">
                    <?php echo '<input type="hidden" name="userId" value=" ' . $user['id'] .' ">' ;?>
                    <div class="col col-4"><button class="btnDelete">delete</button></div>
                    </form>
                    
                    <div class="col col-5"><button class="btn">View profile</button></div>
                </li>
            <?php } ?>
                </ul>
            <?php }?>
    </div>
    
    </body>
</html>