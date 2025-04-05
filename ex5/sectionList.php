<?php
include_once "Sections.php";
session_start();

$sections = Sections::getAll();

?>
<style>
    header{
        background-color:rgb(45, 70, 160);
        color:white;
        margin:0;
        padding:20px;
    }
    h2{
        display: inline;
    }
    a{
        margin:10px;
        opacity:0.7;
    }
    
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php" class="text-white text-decoration-none">Home</a>
        <a href="./studentList.php"  class="text-white text-decoration-none">Liste des Etudiants</a>
        <a href="./sectionList.php" style="opacity:1" class="text-white text-decoration-none">Liste des Sections</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
    <?php if($_SESSION["userRole"]=='admin')
            { ?>
            <a href="addSectionForum.php"><i class="bi bi-plus-circle-fill fs-1"></i></a>
    <?php } ?>
    <div class="container border w-50">      
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">designation</th>
            <th scope="col">description</th>
            <th scope="col">Actions</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach($sections as $section): ?>
            <tr>
            <td> <?= $section['id'] ; ?></td>
            <td><?= $section['designation'] ; ?></td>
            <td><?= $section['description']; ?></td>
            <td class="text-center"><a href="studentList.php?idSection=<?= $section['id'] ?>"><i class="bi bi-card-list"></i></a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>
    </div>

</body>