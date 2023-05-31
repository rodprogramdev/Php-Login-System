<?php 

    // create a class
class SignUpController extends SignUp{
    // PROPERTIES
    // create properties related to data we want to grab

    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    //METHODS
    // create a function construct
    public function __construct($uid, $pwd, $pwdrepeat,$email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signUpUser(){
        if($this->emptyInput() == false){
            //Echo  "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false){
            //Echo  "Invalid Uid";
            header("location: ../index.php?error=invaliduid");
            exit();
        }

        if($this->invalidEmail() == false){
            //Echo  "Invalid email!!";
            header("location: ../index.php?error=invalidemail");
            exit();
        }

        if($this->pwdMatch() == false){
            //Echo  "Invalid email!!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if($this->pwdMatch() == false){
            //Echo  "Passwords don't match";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if($this->uidTakenCheck() == false){
            //Echo  "Username or email have been taken";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid,$this->pwd,$this->email);
    }

    private function emptyInput(){
        $results;
        if(empty($this->uid || $this->pwd ||$this->pwdrepeat || $this->email)){
            $results = false;
        }
        else{
            $results = true;
        }
         return $results;
    }

    private function invalidUid(){
        $results;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $results = false;
        }else{
         $results = true;   
        }
        return $results;
    }

    private function invalidEmail(){
        $results;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $results = false;
        }else{
         $results = true;   
        }
        return $results;
    }

    private function pwdMatch(){
        
        if($this->pwd !== $this->pwdrepeat){
            $results = false;
        }else{
         $results = true;   
        }
        return $results;
    }


    // create a function to check uiser id if taken
    private function uidTakenCheck(){
        $results;
        if($this->checkUser($this->uid, $this->email)){
            $results = false;
        }else{
            $results = true;
        }
        return $results;
    }
}