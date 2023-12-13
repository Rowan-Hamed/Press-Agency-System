<?php
    if(isset($_POST['submit'])) {
        session_start();
        require_once ("../model/Admin.php");

        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNum'];
        $password = $_POST['password'];
        $role = $_SESSION['userType'];
        $profile_image = $_SESSION['urlToPhoto'];
        
        if(empty($password))
            $password = $_SESSION['password'];

        if(isset($_FILES['profile-image']) && !empty($_FILES['profile-image']['name'])) {
            $image_type = strtolower(pathinfo(basename($_FILES['profile-image']["name"]), PATHINFO_EXTENSION));
            $profile_image = $_SESSION['id'] . '.' . $image_type;
            move_uploaded_file($_FILES["profile-image"]["tmp_name"], "../assets/photos/profilePhoto/" . $profile_image);
        }
        $admin = new Admin();


        if(!$admin->updateUser($_SESSION['id'], $first_name, $last_name, $role, $email, $password, $phone, $profile_image)) {
            $_SESSION['old-fname'] = $first_name;
            $_SESSION['old-lname'] = $last_name;
            $_SESSION['old-email'] = $email;
            $_SESSION['old-phone'] = $phone;
            $_SESSION['error-message'] = "An email is taken";
            header("Location: ../view/editProfile.php");
            exit;
        }
        require_once ("../model/User.php");
        $user = new User();
        $user->logout();
        $user->login($email, $password);

        header('Location: ../view/profile.php');
    }

?>