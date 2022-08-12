<?php
class Singup extends Dbh {

    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connenct()->prepare('INSERT INTO users (users_id, users_pwd, users_email) VALUE (?, ?, ?);');
        
        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashPwd, $email))){
            $stmt= null;
            header("location: ../index.php?error=stmefailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connenct()->prepare('SELECT users_uid FROM users WHERE users_uid=? OR users_email=?;');
        if(!$stmt->execute(array($uid, $email))){
            $stmt= null;
            header("location: ../index.php?error=stmefailed");
            exit();
        }
        $resultCheck = null;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}