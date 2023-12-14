<?php
session_start();

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

$role = $userData['userType'];

$phoneNum = $userData['phoneNum'];

$urlToPhoto = $userData['urlToPhoto'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
      body {
          margin: 0;
          padding: 0;
          font-family: "Times New Roman", Times, serif;
          background-image: url('bg1.jpg');
          background-size: cover;
          background-position: center;
          align-items: center;
          justify-content: center;
          height: 100vh;
      }
  
      .profile-container {
          background-color: #fff;
          border-radius: 15px;
          padding: 15px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          text-align: center;
          max-width: 600px;
          width: 50%;
          margin: 0 auto;
          margin-left: 50%;
          transform: translateX(-50%);
      }
  
      .profile-container h1 {
          margin-bottom: 30px;
          color: #333;
      }
  
      .profile-form {
          display: grid;
          gap: 10px;
      }
  
      .profile-form label {
          text-align: left;
          font-weight: bold;
      }
  
      .profile-form .info-container {
          display: flex;
          align-items: center;
          justify-content: space-between;
      }

      .profile-form .info-container div {
          width: calc(100% - 5px);
          padding: 10px;
          box-sizing: border-box;
          border: 1px solid #ccc;
          border-radius: 5px;
      }

      .profile-form input {
          width: calc(100% - 5px);
          padding: 10px;
          box-sizing: border-box;
          border: 1px solid #ccc;
          border-radius: 5px;
      }

      .profile-form img {
          width: 100px;
          height: 100px;
          border-radius: 10%;
      }

      .profile-buttons {
        display: flex;
        justify-content: space-around;
        padding: 8px;
        background-color: #eee;
      }
  
      .profile-buttons button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: #4caf50;
        color: #fff;
        transition: background-color 0.3s;
      }

  </style>
  
</head>
<body>
  <?php include ("../assets/navBar/navBar.php"); ?>
    <div class="profile-container">
        <h1>PROFILE</h1>
        <form class="profile-form">
            <label for="firstName">First Name</label>
            <div class="info-container">
                <div><?php echo $fname ?></div>
            </div>

            <label for="lastName">Last Name</label>
            <div class="info-container">
                <div><?php echo $lname ?></div>
            </div>

            <label for="email">usename</label>
            <div class="info-container">
                <div><?php echo $email ?></div>
            </div>

            <label for="phone">Phone Number</label>
            <div class="info-container">
                <div><?php echo $phoneNum ?></div>
            </div>

            <label for="password">Password</label>
            <div class="info-container">
                <div>********</div>
            </div>

            <label for="profileImage">Profile Image</label>
            <div class="info-container">
              <?php if(!empty($urlToPhoto)) { ?>
                <img src="../assets/photos/profilePhoto/<?php echo $urlToPhoto ?>" alt="Profile Image">
              <?php } else {?>
                <img src="../assets/photos/style/unknown_person.jpg" alt="Profile Image">
                <?php }?>
            </div>
            <br>
        </form>
            <div class="profile-buttons">
                <?php if(isset($_SESSION['id']) && $_SESSION['id'] == $id) { ?>
                  <button onclick="window.location.href='./saved.php'">Saved Posts</button>
                <?php } if(strtolower($role) != "viewer") {?>

                <button onclick="window.location.href='./history.php?id=<?php echo $id; ?>'">History</button>
                
                <?php } if(isset($_SESSION['id']) && $_SESSION['id'] == $id) { ?>
                  <button onclick="window.location.href='./editProfile.php'">Edit Profile</button>
                <?php }?>
            </div>
    </div>
</body>
</html>
