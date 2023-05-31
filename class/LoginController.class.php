<?php

// Create and declare a LoginController class

class LoginController extends Login{
 // Declare some private properties for the username and password
   private $uid;
   private $pwd;

   // Create a function construct to assign property values to our properties
   public function __construct($uid,$pwd){
    $this->uid = $uid;
    $this->pwd = $pwd;
   }

   // Declare a function declaraton for loginUser() 
    public function loginUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // Check for emptyInput then access a method getUser() to refrence username and password        
        $this->getUser($this->uid,$this->pwd);
    }


   // Check for emptyInput() 

    private function emptyInput(){
        $results;
        if(empty($this->uid) || empty($this->pwd)){
            $results = false;
        }
        else{
            $results = true;
        }
        return $results;
    }

}

