<?php

include_once "Users.php";

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$user = Users::getUser($email, $password);

if($user){
    $_SESSION["userRole"] = $user['role'];
    header("Location: ./home.php");
}else{
    header("Location: ./index.php");
}

?>