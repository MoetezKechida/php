<?php
    include "Pokemon.php";
    session_start();
?>

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