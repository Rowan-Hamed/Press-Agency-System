<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User Page</title>
  <style>
    body {
      background: url('../assets/photos/style/bg1.jpg') center center fixed;
      background-size: cover;
      font-family: "Times New Roman", Times, serif;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .signup-container {
      background: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .signup-container h2 {
      margin-bottom: 30px;
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

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group .profile-image {
      margin-top: 10px;
    }

    .form-group.horizontal {
      display: flex;
      justify-content: space-between;
    }

    .form-group.horizontal .half-width {
      width: 48%; /* Adjust width as needed */
    }

    .submit-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .login-link {
      display: block;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h2>ADD USER</h2>
    <form action="#" method="post">
      <div class="form-group horizontal">
        <div class="half-width">
          <label for="first-name">First Name</label>
          <input type="text" id="first-name" name="first-name" required>
        </div>
        <div class="half-width">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" name="last-name" required>
        </div>
      </div>
      <div class="form-group horizontal">
        <div class="half-width">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="half-width">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
      </div>
      <div class="form-group">
        <label for="profile-image">Profile Image</label>
        <input type="file" id="profile-image" name="profile-image" accept="image/*">
      </div>
      <div class="form-group">
        <label for="user-role">User Role</label>
        <select id="user-role" name="user-role" required>
          <option value="editor">Editor</option>
          <option value="viewer">Viewer</option>
        </select>
      </div>
      <button type="submit" class="submit-btn">Add User</button>
    </form>
  </div>
</body>
</html>
