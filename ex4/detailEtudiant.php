<?php
    include_once "autoloader.php";
    $db = ConnexionDB::getInstance();
    $id = $_GET['id'];
    $query = "SELECT * from student where id={$id}";
    $response = $db->query($query);
    $element=$response->fetch(PDO::FETCH_OBJ);
    if(!$element)
    {
        header("location: ./index.php");
    }
?>
<style>
.container{
    margin-top: 5%; 
    
}
</style>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="container text-center w-50 border">        
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">birthday</th>
            </tr>
        </thead>
        <tbody>
    
            <tr>
            <td> <?= $element->id  ?></td>
            <td><?= $element->name  ?></td>
            <td><?= $element->birthday  ?></td>
            </tr>
        
        </tbody>
        </table>
        <a href="./index.php">
            <button type="button" class="btn btn-secondary mt-3">go back</button>
        </a>
    </div>            
</body>
</html>