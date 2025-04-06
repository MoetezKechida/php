<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
$student=Students::getStudent($_GET['id']);

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
    img{
        width:40px;
        border-radius:50%;
        aspect-ratio: 1;
    }
    
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php" class="text-white text-decoration-none">Home</a>
        <a href="./studentList.php" style="opacity:1" class="text-white text-decoration-none">Liste des Etudiants</a>
        <a href="./sectionList.php" class="text-white text-decoration-none">Liste des Sections</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
    <br>
    <br>
    <div class="container border w-50">      
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col" style="width: 50px;" >image</th>
            <th scope="col">name</th>
            <th scope="col">birthday</th>
            <th scope="col">section</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td> <?= $student['id']  ?></td>
            <td><img src="./uploads/<?=$student['image']; ?>"></td>
            <td><?= $student['name']  ?></td>
            <td><?= $student['birthday']  ?></td>
            <td><?php 
            $section=Sections::getSection($student['section']);
            echo $section['designation']; ?> 
            </td>
            </tr>
            
            
        </tbody>
        </table>
        <a href="./studentList.php">
            <button class="btn btn-primary">go back</button>
        </a>
    </div>

</body>