<?php
    $_SESSION['hh']='gg';
    include('../model/User.php');
$hi = new User();
$hi->login('hany.maged9102@gmail.com','1122');
    echo $_SESSION['fName'];
    $hi->setlName('hi');
    echo $_SESSION['lname'];
    
    ?>