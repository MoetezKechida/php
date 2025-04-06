<?php

    include_once "Pokemon.php";
    include_once "PokemonEau.php";
    include_once "PokemonFeu.php";
    include_once "PokemonPlante.php";
    session_start();
    
    $_SESSION['DamageDoneToChoice2']=$_SESSION['choice1']->attack($_SESSION['choice2']);
    $_SESSION['DamageDoneToChoice1']=$_SESSION['choice2']->attack($_SESSION['choice1']);
    $_SESSION['round']+=1;
    if(($_SESSION['choice1']->isDead() || $_SESSION['choice2']->isDead()) && !isset($_SESSION['FinalRound']))
    {
        if($_SESSION['choice1']->getHp()<=$_SESSION['choice2']->getHp())
        {
            $_SESSION['FinalRound']='choice2';
        }
        else
        {
            $_SESSION['FinalRound']='choice1';
        }
    }
    
    if(isset($_SESSION['winner']))
    {
        header("Location: ./Winner.php");
    }
    else
    {
        header("location: ./FightArena.php");
    }
?>

