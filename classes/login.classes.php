<?php
class Login extends Dbh {

    protected function getUser($uid, $pwd){
        $stmt = $this->connenct()->prepare('SELECT users_pwd FROM users WHERE users_uid=? OR users_email=?;');
        

        if(!$stmt->execute(array($uid, $pwd))){
            $stmt= null;
            header("location: ../index.php?error=stmefailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt= null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdhashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdhashed[0]["users_pwd"]);

        if($checkPwd == false){
            $stmt= null;
            header("location: ../index.php?error=rongpassword");
            exit();
        }
        elseif ($checkPwd == true) {
            $stmt = $this->connenct()->prepare('SELECT users_pwd FROM users WHERE users_uid=? OR users_email=? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd))){
                $stmt= null;
                header("location: ../index.php?error=stmefailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt= null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useriid"] = $user[0]["users_uid"];

            $stmt= null;
        }

        $stmt = null;
    }

    

}