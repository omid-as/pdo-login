<?php

if (isset($_POST['submit'])) {
    
    //grabing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    
    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $signup = new loginContr($uid, $pwd, $pwdRepeat, $email);

    // sign up error handler
    $login->loginUser();

    //gonig back to front page
    header("location: ../index.php?error=none");
}