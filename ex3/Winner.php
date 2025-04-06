<?php
    include_once "Pokemon.php";
    include_once "PokemonEau.php";
    include_once "PokemonFeu.php";
    include_once "PokemonPlante.php";
    session_start();
?>
<style>
    .image{
        height: 400px;
        width: 400px;
    }

</style>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<html >
<body>
<div class="container text-center">
    <div class="container text-center alert alert-success" role="alert">
        <h1>
            And the winner is:  
            <?php
            $winner=$_SESSION['winner'];
            $_SESSION[$winner]->whoAmI();
            if($_SESSION['choice1']->getName()==$_SESSION['choice2']->getName())
            {
                if ($winner=='choice1')
                {
                    echo "(first fighter)";
                }
                else
                {
                    echo "(second fighter)";
                }
            }
            
            ?>
        </h1>
    
        <img src="<?php echo $_SESSION[$winner]->getImage(); ?>" class="image">
    </div>
    <a href="./ResetFight.php">
        <button type="button" class="btn btn-secondary mt-3">go back</button>
    </a>
</div>
</body>
</html>