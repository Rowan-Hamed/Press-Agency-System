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
          display: flex;
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
  </style>
  
</head>
<body>

    <div class="profile-image-container">
        <img src="unknown_person.jpg" alt="Profile Image">
    </div>

    <div class="profile-container">
        <h1>PROFILE</h1>
        <form class="profile-form">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" placeholder="Enter your first name" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" placeholder="Enter your last name" required>

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" placeholder="Enter your phone number" required>

            <label for="profileImage">Profile Image</label>
            <input type="file" id="profileImage" accept="image/*" required>
            <br>
            <button type="submit">Save Profile</button>
        </form>
    </div>

</body>
</html>
