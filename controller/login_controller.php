<?php
    if(isset($_POST['submit'])) {
        session_start();

        include ('../model/User.php');
        $user = new User();
        if($user->login($_POST['username'], $_POST['password'])) {
            header('Location: ../view/profile.php');
        }
        else {
            $_SESSION['message_Error'] = "Wrong User Name or Password";
            header('Location: ../view/login.php');
        }
    }

?>