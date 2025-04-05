<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
if(!isset($_GET['idSection']))
{
    $students=Students::getAll();
}
else
{
    $students=Students::getStudentBySection($_GET['idSection']);
}
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
        <a href="./studentList.php" style="opacity:1" class="text-white text-decoration-none">Liste des Etudiants</a>
        <a href="./sectionList.php" class="text-white text-decoration-none">Liste des Sections</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
        <?php if($_SESSION["userRole"]=='admin')
            { ?>
            <a href="addStudentForum.php"><i class="bi bi-person-fill-add fs-1"></i></a>
        <?php } ?>
    <div class="container border w-50">      
        <table class="table table-striped-columns">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">birthday</th>
            <th scope="col" style="width: 50px;" >image</th>
            <th scope="col">section</th>
            <th scope="col" style="width: 50px;">options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
            <tr>
            <td> <?= $student['id']  ?></td>
            <td><?= $student['name']  ?></td>
            <td><?= $student['birthday']  ?></td>
            <td><img src="<?php echo $student['image']; ?>" class="image" style="width:40px"></td>
            <td><?php 
            $section=Sections::getSection($student['section']);
            echo $section['designation']; ?> 
            </td>
            <td class="text-center"><a href="detailStudent.php?id=<?= $student['id'] ?>"><i class="bi bi-info-circle-fill"></i></a></td>
            
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>
    </div>

</body>