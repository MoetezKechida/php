<?php
include_once "Pokemon.php";
include_once "PokemonEau.php";
include_once "PokemonFeu.php";
include_once "PokemonPlante.php";
session_start();
if(!isset($_SESSION['round']))
{
    $_SESSION['round']=1;
}
?>

<style>
    .image{
        height: 300px;
        width: 300px;
    }

</style>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<html>
    <body>

    
    <div class="container text-center alert alert-info" role="alert">
        <h3>Les Combatents:</h3>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col alert alert-secondary" role="alert">
                <h1><?php $_SESSION['choice1']->whoAmI(); ?></h1>  
                <img src="<?php echo $_SESSION['choice1']->getImage(); ?>" class="image">
                
            </div>
            <div class="col alert alert-secondary" role="alert">
                <h1><?php $_SESSION['choice2']->whoAmI(); ?></h1> 
                <img src="<?php echo $_SESSION['choice2']->getImage(); ?>" class="image">
            </div>       
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                points: <?php echo $_SESSION['choice1']->getHp();
                if(isset($_SESSION['DamageDoneToChoice1']))
                {
                    echo "(damge taken: ",$_SESSION['DamageDoneToChoice1'],")";
                }
                
                ?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                points: <?php echo $_SESSION['choice2']->getHp();
                if(isset($_SESSION['DamageDoneToChoice2']))
                {
                    echo "(damge taken: ",$_SESSION['DamageDoneToChoice2'],")";
                }
                ?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Minimal base damage attack : <?= $_SESSION['choice1']->getAttMin();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Manimal base damge attack: <?= $_SESSION['choice2']->getAttMin();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Maximal base damage attack :<?= $_SESSION['choice1']->getAttMax();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Maximal base damage attack :<?= $_SESSION['choice2']->getAttMax();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Special attack multiplier : <?= $_SESSION['choice1']->getAttSpec();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Special attack multiplier : <?= $_SESSION['choice2']->getAttSpec();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Special attack probability : <?= $_SESSION['choice1']->getProbAttSpec();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Special attack probability : <?= $_SESSION['choice2']->getProbAttSpec();?>
            </div>
        </div>
        <a href="./attack.php">
            <button type="button" class="btn btn-secondary"> 
            <?php 
            if(isset($_SESSION['FinalRound']))
            {
                echo "winner";
                $_SESSION['winner']=$_SESSION['FinalRound'];
            }    
            else
            {
                echo "round ",$_SESSION['round'];
            }
            ?>
            
        </button>
        </a>
        <a href="./ResetFight.php">
            <button type="button" class="btn btn-secondary">reset fight</button>
        </a>
        

    </div>

    </body>
</html>