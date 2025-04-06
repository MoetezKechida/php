<?php
include_once "Pokemon.php";
include_once "PokemonEau.php";
include_once "PokemonFeu.php";
include_once "PokemonPlante.php";
session_start();


?>

<style>
    .image{
        height: 200px;
        width: 200px;
    }

</style>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<html>
    <body>

    
    <div class="container text-center alert alert-info" role="alert">
        <h1>choose Second Fighter</h1>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Rayquaza" style="text-decoration: none; color: inherit;" >
                <div>Rayquaza</div>
                <img src="./images/Rayquaza.png" class="image">
            </a>
            </div>
            <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Deoxys" style="text-decoration: none; color: inherit;" >
                <div>Deoxys</div>
                <img src="./images/Deoxys.png" class="image">
            </a>
            </div>
            <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Arceus" style="text-decoration: none; color: inherit;" >
                <div>Arceus</div>
                <img src="./images/Arceus.png" class="image">
            </a>
            </div>
        </div>
        <div class="row">
        <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Charizard" style="text-decoration: none; color: inherit;" >
                <div>Charizard</div>
                <img src="./images/Charizard.png" class="image">
            </a>
            </div>
            <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Blastoise" style="text-decoration: none; color: inherit;" >
                <div>Blastoise</div>
                <img src="./images/Blastoise.png" class="image">
            </a>
            </div>
            <div class="col alert alert-secondary">
            <a href="./chooseSecondFighter.php?name=Venusaur" style="text-decoration: none; color: inherit;" >
                <div>Venusaur</div>
                <img src="./images/Venusaur.png" class="image">
            </a>
            </div>
        </div>
    </div>
    

    </body>
</html>