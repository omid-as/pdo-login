<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8">
        <meta name="viewpoint" content="width=device-width initial-scale=1.0">
        <title>omid's site</title>
    </head>
    <body>
        <h4>SIGN UP</h4>
        <p>Don't have an account yet ? Sing up here!</p>
        <form action="includes/signup.inc.php"  method="post">
            <input type="text" name="uid" placeholder="enter your user name">
            <input type="password" name="pwd" placeholder="enter your password">
            <input type="password" name="pwdrepeat" placeholder="Repead password">
            <input type="text" name="email" placeholder="enter your email">
            <br>
            <button type="submit" name="submit">Sign up</button>
        </form>
        <h4>LOGIN</h4>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="enter your user name/ email">
            <input type="password" name="pwd" placeholder="enter your password">
            <br>
            <button type="submit" name="submit">Log in</button> 
        </form>
    </body>
</html>
