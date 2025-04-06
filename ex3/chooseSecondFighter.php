<?php 
include_once "Pokemon.php";
include_once "PokemonEau.php";
include_once "PokemonFeu.php";
include_once "PokemonPlante.php";
session_start();
if(isset($_SESSION['choice2']))
{
    unset($_SESSION['choice2']);
}
if(!isset($_SESSION['choice2']))
{
    if($_GET['name']=='Rayquaza')
    {
        $_SESSION['choice2']=new Pokemon("Rayquaza",
        "./images/Rayquaza.png"
        ,800,50,150,2,50);
    }
    else if($_GET['name']=='Deoxys')
    {
        $_SESSION['choice2']=new Pokemon("Deoxys",
        "./images/Deoxys.png",
        650,40,120,3,50);
    }
    else if($_GET['name']=='Arceus')
    {
        $_SESSION['choice2']=new Pokemon("Arceus",
        "./images/Arceus.png",
        1000,20,80,3,50);
    }
    else if($_GET['name']=='Charizard')
    {
        $_SESSION['choice2']=new PokemonFeu("Charizard",
        "./images/Charizard.png",
        600,80,180,2,50);
    }
    else if($_GET['name']=='Blastoise')
    {
        $_SESSION['choice2']=new PokemonEau("Blastoise",
        "./images/Blastoise.png",
        750,30,110,4,50);
    }
    else if($_GET['name']=='Venusaur')
    {
        $_SESSION['choice2']=new PokemonPlante("Venusaur",
        "./images/Venusaur.png",
        900,20,120,3,50);
    }
}
header("Location: ./FightArena.php");

?>