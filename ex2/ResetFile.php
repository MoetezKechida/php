<?php
    include_once "Session.php";
    
    $sess=new Session();
    $sess->destroy();
    header("Location: ./index.php");
?>

 
