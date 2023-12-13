<?php
session_start();

if(!isset($_SESSION['id']))
    header('Location: login.php');

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phoneNum'];
$error = "";

if(isset($_SESSION['error-message'])) {
    $fname = $_SESSION['old-fname'];
    $lname = $_SESSION['old-lname'];
    $email = $_SESSION['old-email'];
    $phone = $_SESSION['old-phone'];
    $error = $_SESSION['error-message'];
    unset($_SESSION['old-fname']);
    unset($_SESSION['old-lname']);
    unset($_SESSION['old-email']);
    unset($_SESSION['old-phone']);
    unset($_SESSION['error-message']);
}
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
          background-image: url('bg1.jpg'); /* Add your background image URL */
          background-size: cover;
          background-position: center;
          align-items: center;
          justify-content: center;
          height: 100vh;
      }
  
      .profile-container {
          background-color: #fff; /* Set your desired background color for the profile container */
          border-radius: 15px;
          padding: 20px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          text-align: center;
          max-width: 600px; /* Increased width */
          width: 50%; /* Adjust the width as needed */
          margin: 0 auto; /* Center the container */
          margin-left: 50%; /* Move the container to the middle */
          transform: translateX(-50%); /* Adjust to center */
      }
  
      .profile-container h1 {
          margin-bottom: 30px;
          color: #333; /* Set your desired text color */
      }
  
      .profile-form {
          display: grid;
          gap: 10px;
      }
  
      .profile-form label {
          text-align: left;
          font-weight: bold;
      }
  
      .profile-form input {
          width: calc(100% - 5px);
          padding: 10px;
          box-sizing: border-box;
          border: 1px solid #ccc;
          border-radius: 5px;
      }
  
      .profile-form button {
          width: 100%;
          padding: 10px;
          box-sizing: border-box;
          background-color: #4caf50; /* Set your desired background color for the button */
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }
  
      .profile-image-container {
          width: 25%; /* Adjust the width as needed */
          text-align: left;
          padding: 20px;
          position: absolute; /* Position absolutely */
          left: 80px; /* Adjust as needed */
      }
  
      .profile-image-container img {
          width: 170px;
          height: 170px;
          border-radius: 20%;
          margin-bottom: 480px;
      }
    .error {
      color: red;
    }
  </style>
  
</head>
<body>
<?php include("../assets/navBar/navBar.php"); ?>
<script src="../assets/js/script.js"></script>
    <div class="profile-image-container">
        <?php if(empty($_SESSION['urlToPhoto'])) { ?>
            <img style="width: 50%; height: 50%; border-radius: 50%" src="../assets/photos/style/unknown_person.jpg" alt="Profile Image">
        <?php } 
            else { ?>
                <img style="width: 50%; height: 50%; border-radius: 50%" src="../assets/photos/profilePhoto/<?php echo $_SESSION['urlToPhoto'] ?>" alt="Profile Image">
        <?php } ?>
    </div>
    <div class="profile-container">
        <h1>EDIT PROFILE</h1>
        
        <form action="../controller/editProfile_controller.php" method="post" class="profile-form" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="first-name">First Name</label>
            <input type="text" value="<?php echo $fname ?>" name="fname" id="first-name" placeholder="Enter your first name" required>

            <label for="lastName">Last Name</label>
            <input type="text" value="<?php echo $lname ?>" name="lname" id="lastName" placeholder="Enter your last name" required>

            <?php if(!empty($error)) {?>
                <h3 style = "color: red"> <?php echo $error?> </h3>
            <?php }?>
            <label for="email">Email</label>
            <input type="text" value="<?php echo $email ?>" name="email" id="email" placeholder="Enter your email" required>
            <span id="email-error" class="error"></span>

            <label for="phone">Phone Number</label>
            <input type="tel" value="<?php echo $phone ?>" name="phoneNum" id="phone" placeholder="Enter your phone number" required>
            <span id="phone-error" class="error"></span>

            <label for="password">password</label>
            <input type="password" id="password" placeholder="Enter your password" name="password">
            <span id="password-error" class="error"></span>

            <label for="profileImage">Profile Image</label>
            <input type="file" id="profileImage" accept="image/*" name="profile-image">
            <br>
            <button type="submit" name="submit">Save Profile</button>
        </form>
    </div>

</body>
</html>
