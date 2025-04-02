<?php
    include_once "Session.php";
    
    $sess=new Session();
    $sess->destroy();
    header("Location: http://localhost:8000/index.php");
?>

 
