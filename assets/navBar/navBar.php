  <head>
  <link rel="stylesheet" type="text/css" href="../assets/navBar/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      background: url('../assets/photos/style/bg1.jpg') center center fixed;
      background-size: cover;
      font-family: "Times New Roman", Times, serif;
      margin: 0;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
  </head>
  
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="wall.php">press agency</a>
      </div>
      <ul class="nav navbar-nav navbar-right">

      <?php if(isset($_SESSION['userType']) && (strtolower($_SESSION['userType']) === "admin" || strtolower($_SESSION['userType']) === "editor")) { ?>
          <li><a href="addPost.php">add new post</a></li>
        <?php } ?>
      <?php if(isset($_SESSION['userType']) && strtolower($_SESSION['userType']) === "admin") { ?>
            <li><a href="requestedNews.php">requested news</a></li>
            <li><a href="addUser.php">add new user</a></li>
            <li><a href="usersList.php">Users List</a></li>
        <?php } ?>

        <li><a href="wall.php">Wall</a></li>

        <?php if(isset($_SESSION['id'])) { ?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../controller/logout.php">Logout</a></li>
        <?php }
         else { ?>
            <li><a href="../view/login.php">Login</a></li>
        <?php }?>
        
      </ul>
    </div>
  </nav>