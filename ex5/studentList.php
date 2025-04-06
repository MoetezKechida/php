<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
if(isset($_GET['idSection'])){
    $students=Students::getStudentBySection($_GET['idSection']);
}
else if(isset($_GET['filter'])){
    $students=Students::getStudentsByNameFilter($_GET['filter']);
}else{
    $students=Students::getAll();
}
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

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
        text-decoration: none;
    }
    img{
        width:40px;
        border-radius:50%;
        aspect-ratio: 1;
    }
    .extractButton{
        opacity:1;
        margin:0;
        text-decoration: none;
        border: none;
    }
    
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php" class="text-white text-decoration-none">Home</a>
        <a href="./studentList.php" style="opacity:1" class="text-white text-decoration-none">Students List</a>
        <a href="./sectionList.php" class="text-white text-decoration-none">Sections List</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
    <br>
    <center>Students List</center>
    <br>
    <center>
        <form action="filterStudents.php" method="post">
            <input type="text" placeholder="filter by name" name="filter">
            <button type="submit" class="btn btn-danger" >Filter</button>
            <?php if($_SESSION["userRole"]=='admin')
            { ?>
            <a href="addStudentForum.php"><i class="bi bi-person-fill-add fs-1"></i></a>
        <?php } ?>
        </form>
        Copy in
        <?php 
        $parameters = "";
        if (isset($_GET['idSection'])){
            $parameters = "?idSection=$_GET[idSection]";
        }
        else if (isset($_GET['filter'])){
            $parameters = "?filter=$_GET[filter]";
        }
        ?>
        <a href="./extractStudentsExcel.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">EXCEL</button>
        </a>
        <a href="./extractStudentsCSV.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">CSV</button>
        </a>
        <a href="./extractStudentsPdf.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">PDF</button>
        </a>
    </center>
    <br>
        
    <div class="container border w-50">
        <table class="table table-striped-columns" id="table">
        <thead>
            <tr>
            <th>id</th>
            <th style="width: 50px;" >image</th>
            <th>name</th>
            <th>birthday</th>
            <th>section</th>
            <th style="width: 150px;">options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
            <tr>
            <td><?= $student['id']  ?> </td>
            <td><img src="./uploads/<?php echo $student['image']; ?>"></td>
            <td><?= $student['name']  ?></td>
            <td><?= $student['birthday']  ?></td>
            <td><?php 
            $section=Sections::getSection($student['section']);
            echo $section['designation']; ?> 
            </td>
            <td class="text-center">
                <a href="./detailStudent.php?id=<?= $student['id'] ?>"><i class="bi bi-info-circle-fill"></i></a>
                <?php if($_SESSION["userRole"]=='admin')
                { ?>
                    <a href="./deleteStudent.php?id=<?=$student['id']?>"><i class="bi bi-trash"></i></a>
                    <a href="./updateStudentForm.php?id=<?=$student['id']?>"><i class="bi bi-pencil"></i></a>
                <?php } ?>
            </td>
            
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable(document.getElementById('table'), {pageLength: 2 });
    });
</script>