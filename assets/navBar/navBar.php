<head>
  <link rel="stylesheet" type="text/css" href="../assets/navBar/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
  
  <header>
        <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
        <a href="" class="logo"><span>agency</span>
        <nav class="navbar">
            <?php if(isset($_SESSION['userType']) && (strtolower($_SESSION['userType']) === "admin" || strtolower($_SESSION['userType']) === "editor")) { ?>
              <a href="addPost.php">add post</a>
            <?php } ?>

            <?php if(isset($_SESSION['userType']) && strtolower($_SESSION['userType']) === "admin") { ?>
              <a href="requestedNews.php">requested news</a>
              <a href="addUser.php">add user</a>
             <a href="usersList.php">Users List</a>
            <?php } ?>

              <a href="wall.php">Wall</a>

            <?php if(!isset($_SESSION['id'])) { ?>
              <a href="../view/login.php">Login</a>
            <?php } ?>

        </nav>
        <div class="icon">
           <i class="fas fa-search" onclick="showbar()" id="search-btn"></i>
           <a href="profile.php"> <i class="fas fa-user"></i> </a>
        </div>
        <form action="" class="search-form">
           <input type="search" id="search-bar" placeholder="what you looking for....">
           <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>
    
    <script src="../assets/js/NEWS.js"></script>
