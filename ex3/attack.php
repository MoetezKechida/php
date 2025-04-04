<?php

    include "Pokemon.php";
    session_start();
    
    $_SESSION['DamageDoneToDeoxys']=$_SESSION['Rayquaza']->attack($_SESSION['Deoxys']);
    $_SESSION['DamageDoneToRayquaza']=$_SESSION['Deoxys']->attack($_SESSION['Rayquaza']);
    $_SESSION['round']+=1;
    if(($_SESSION['Rayquaza']->isDead() || $_SESSION['Deoxys']->isDead()) && !isset($_SESSION['FinalRound']))
    {
        if($_SESSION['Rayquaza']->getHp()<=$_SESSION['Deoxys']->getHp())
        {
            $_SESSION['FinalRound']='Deoxys';
        }
        else
        {
            $_SESSION['FinalRound']='Rayquaza';
        }
    }
    
    if(isset($_SESSION['winner']))
    {
        header("Location: ./Winner.php");
    }
    else
    {
        header("location: ./index.php");
    }
?>

