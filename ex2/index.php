<?php
    include_once "Session.php";
    $sess=new Session();

?>
<style>
    .container{
        width:50%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
</style>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<html>
    <body>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <?php
                if(!$sess->isset('nbrvisites'))
                {
                    echo "Bienvenu à notre plateforme.";
                    $sess->set('nbrvisites',1);
                }
                else
                {
                    echo "Merci pour votre fidélité,c’est votre " . $sess->get('nbrvisites')+1 . " éme visite.";
                    $sess->set('nbrvisites',$sess->get('nbrvisites')+1);
                }
            ?>
        </div>
        <a href="ResetFile.php">
            <button type="button" class="btn btn-secondary">reset</button>
        </a>
        
    </div>


    </body>
</html>