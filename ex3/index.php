<?php
include "Pokemon.php";
session_start();

if(!isset($_SESSION['Rayquaza']) || !isset($_SESSION['Deoxys']))
{   
    
    $_SESSION['Rayquaza']=new Pokemon("Rayquaza", //aka border patrol
    "./images/Rayquaza.png"
    ,800,50,150,2,50);
    
    $_SESSION['Deoxys']=new Pokemon("Deoxys", //ma boi ray ray gonna beat him 
    "./images/Deoxys.png",
    650,40,120,3,50);

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
        les Combatents:
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col alert alert-secondary" role="alert">
                <h1><?php $_SESSION['Rayquaza']->whoAmI(); ?></h1>  
                <img src="<?php echo $_SESSION['Rayquaza']->getImage(); ?>" class="image">
                
            </div>
            <div class="col alert alert-secondary" role="alert">
                <h1><?php $_SESSION['Deoxys']->whoAmI(); ?></h1> 
                <img src="<?php echo $_SESSION['Deoxys']->getImage(); ?>" class="image">
            </div>       
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                points: <?php echo $_SESSION['Rayquaza']->getHp();
                if(isset($_SESSION['DamageDoneToRayquaza']))
                {
                    echo "(damge taken: ",$_SESSION['DamageDoneToRayquaza'],")";
                }
                
                ?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                points: <?php echo $_SESSION['Deoxys']->getHp();
                if(isset($_SESSION['DamageDoneToDeoxys']))
                {
                    echo "(damge taken: ",$_SESSION['DamageDoneToDeoxys'],")";
                }
                ?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Minimal base damage attack : <?= $_SESSION['Rayquaza']->getAttMin();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Manimal base damge attack: <?= $_SESSION['Deoxys']->getAttMin();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Maximal base damage attack :<?= $_SESSION['Rayquaza']->getAttMax();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Maximal base damage attack :<?= $_SESSION['Deoxys']->getAttMax();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Special attack multiplier : <?= $_SESSION['Rayquaza']->getAttSpec();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Special attack multiplier : <?= $_SESSION['Deoxys']->getAttSpec();?>
            </div>
        </div>
        <div class ="row">
            <div class="col alert alert-secondary" role="alert">
                Special attack probability : <?= $_SESSION['Rayquaza']->getProbAttSpec();?>
            </div>
            <div class="col alert alert-secondary" role="alert">
                Special attack probability : <?= $_SESSION['Deoxys']->getProbAttSpec();?>
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