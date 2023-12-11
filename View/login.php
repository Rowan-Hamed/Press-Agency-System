<?php
  session_start();
  if(isset($_SESSION['userId'])) {
    header('Location: profile.php');
  }

  if(isset($_SESSION['message_Error'])){
    $message_Error = $_SESSION['message_Error'];
    unset($_SESSION['message_Error']);
  }
  else
    $message_Error = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: url('../assets/photos/style/bg1.jpg') center center fixed; /* Background image */
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.9); /* Background color with opacity */
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    .login-container h2 {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .checkbox-group label {
      display: flex;
      align-items: center;
    }

    .checkbox-group input {
      margin-right: 5px;
    }

    .submit-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }

    .signup-link {
      margin-top: 10px;
    }
  </style>
  <title>Login Page</title>
</head>
<body>

  <div class="login-container">
    <h2>LOGIN</h2>
    
    <form method = "post" action = "../controller/login_controller.php">
      <div class="form-group">
        <h2 style = "color: red"><?php echo $message_Error?></h2>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="checkbox-group">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
        <a href="#">Forget password?</a>
      </div>

      <button type="submit" name = "submit" class="submit-btn">Login</button>
    </form>

    <div class="signup-link">
      <p>Don't have an account? <a href="#">Sign up</a></p>
    </div>
  </div>

</body>
</html>
