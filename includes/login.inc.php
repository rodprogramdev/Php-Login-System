<?php 

if(isset($_POST["submit"])){
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];



include "../class/Dbh.class.php";
include "../class/Login.class.php";
include "../class/LoginController.class.php";

$login = new LoginController($uid,$pwd);

$login->loginUser();

header("location: ../index.php?error=none");

}
