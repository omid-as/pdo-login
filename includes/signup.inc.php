<?php

if (isset($_POST['submit'])) {
    
    //grabing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];
    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // sign up error handler
    $signup->signupUser();

    //gonig back to front page
    header("location: ../index.php?error=none");
}