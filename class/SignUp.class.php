<?php

class SignUp extends Dbh{

    protected function setUser($uid, $pwd, $email){
        // Set and add the username. // Set and add the email. // Set and add the password.
        // setup a stmt for connect with the database.
        // INSERT data into our table inside of our databse. Include into our insert statment the column names inside of our database users_id 	users_uid 	users_pwd 	users_email 	
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid,users_pwd,users_email) VALUES(?,?,?);');
        
        // We want to add security in our password collection from the user.
        // create a variable for the hashed password
        // use password_hash() Inside of this built in method we need to tell it what it needs to hash 
        // we would want to match our password hash 

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if(!$stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }


    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? or users_email = ?;');
        
        if(!$stmt->execute(array($uid,$email))){
            $stmt = null;
            header("location:../index.php?error?stmtfailed");
            exit();
        }
        $resultCheck;


        if(!$stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }


}