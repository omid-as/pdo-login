<?php

class SignupContr extends Singup{

    private $uid;
    private $pwd;
    private $pwdRpeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false){
            // echo "Empty input";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false){
            // echo "Invalid Uid";
            header("location: ../index.php?error=invalidUid");
            exit();
        }
        if($this->invalidEmail() == false){
            // echo "Invalid Email";
            header("location: ../index.php?error=InvalidEmail");
            exit();
        }
        if($this->pwdMatch() == false){
            // echo "PAssword match";
            header("location: ../index.php?error=pwdMatch");
            exit();
        }
        if($this->uidTakenCheck() == false){
            // echo "Uid taken check";
            header("location: ../index.php?error=uidTakenCheck");
            exit();
        }
        $this->setUser($this->uid, $this->pwd, $this->email);
        
    }

    private function emptyInput() 
    {
        $result;
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) 
        {
            $result = false;
        } else
        {
            $result = true;
        }
        return $result;
    }
    private function invalidUid() 
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) 
        {
            $result = false;
        } else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() 
    {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        } else
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() 
    {
        $result;
        if ($this->pwd !== $this->pwdRepeat)
        {
            $result = false;
        } else
        {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() 
    {
        $result;
        if (!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        } else
        {
            $result = true;
        }
        return $result;
    }
    
}