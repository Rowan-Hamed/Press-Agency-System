<?php
    if(isset($_POST['submit'])) {
        session_start();
        if(!isset($_SESSION['userType']) || strtolower($_SESSION['userType']) !== "admin") {
            header('Location: profile.php');
            exit;
        }
        include ("../model/Admin.php");

        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['user-role'];

        $admin = new Admin();

        $id = $admin->addUser($first_name, $last_name, $role, $email, $password, $phone, "");

        if($id == 0) {
            $_SESSION['old-fname'] = $first_name;
            $_SESSION['old-lname'] = $last_name;
            $_SESSION['old-email'] = $email;
            $_SESSION['old-phone'] = $phone;
            $_SESSION['error-message'] = "An email is taken";
            header("Location: ../view/addUser.php");
            exit;
        }

  
        if(isset($_FILES['profile-image']) && !empty($_FILES['profile-image']['name'])) {
            $image_type = strtolower(pathinfo(basename($_FILES['profile-image']["name"]), PATHINFO_EXTENSION));
            $profile_image = $id . '.' . $image_type;
            move_uploaded_file($_FILES["profile-image"]["tmp_name"], "../assets/photos/profilePhoto/" . $profile_image);
            $admin->updateUser($id, $first_name, $last_name, $role, $email, $password, $phone, $profile_image);
        }
        header('Location: ../view/profile.php');
    }

?>