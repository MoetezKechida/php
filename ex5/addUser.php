<?php

include_once "Users.php";

$username = $_POST["username"];
$role = $_POST["role"];
$email = $_POST["email"];
$pwd1 = $_POST["password1"];
$pwd2 = $_POST["password2"];


//TODO: add parameters empty checker
if(Users::emailExists($email)){
    header("Location: ./addUserForm.php?errorMsg=email%20already%20exists");
}
else if( $pwd1 != $pwd2){
    header("Location: ./addUserForm.php?errorMsg=passwords%20don't%20match");
}else{
    Users::addUser($username, $email, $pwd1, $role);
    header("Location: ./index.php");
}

?>