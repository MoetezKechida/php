<?php

include_once "Users.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(Users::getUser($email, $password)){
    header("Location: ./home.php");
}else{
    header("Location: ./index.php");
}

?>