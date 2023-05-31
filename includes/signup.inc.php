<?php 

if(isset($_POST["submit"])){
    // We want to grab data from the user input
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];


    // We want to include the data from the SignUpController.class.php
    include "../class/Dbh.class.php";
    include "../class/SignUp.class.php";
    include "../class/SignUpController.class.php";

    // Instantiate the SignUpController class
    $signup = new SignUpController($uid,$pwd,$pwdrepeat,$email);
    


    // Run some error handlers
    $signup->signUpUser();


    // Go back to home page
    header("location: ../index.php?error=none");
}