<?php
    include_once "autoloader.php";
    

    Student::addStudent('1','moetez','2004-04-16');
    Student::addStudent('2','dhia','2004-10-19');
    $query = "SELECT * from student";
    $response = Student::getBdd()->query($query);
    $elements = $response->fetchAll(PDO::FETCH_OBJ);
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
    <div class="container border w-50">        
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">birthday</th>
            <th scope="col" style="width: 50px;">detail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($elements as $el): ?>
            <tr>
            <td> <?= $el->id  ?></td>
            <td><?= $el->name  ?></td>
            <td><?= $el->birthday  ?></td>
            <td class="text-center"><a href="detailEtudiant.php?id=<?= $el->id ?>"><i class="bi bi-info-circle-fill"></i></a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>
    </div>            
</body>
</html>