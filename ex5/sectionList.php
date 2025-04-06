<?php
include_once "Sections.php";
session_start();
$sections = Sections::getAll();

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
        <a href="./studentList.php"  class="text-white text-decoration-none">Students List</a>
        <a href="./sectionList.php" style="opacity:1" class="text-white text-decoration-none">Sections List</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
    <br>
    <center>Sections List</center>
    <br>
    <center>
        Copy in
        <?php 
        $parameters = "";
        if (isset($_GET['filter'])){
            $parameters = "?filter=$_GET[filter]";
        }
        ?>
        <a href="./extractSectionsExcel.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">EXCEL</button>
        </a>
        <a href="./extractSectionsCSV.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">CSV</button>
        </a>
        <a href="./extractSectionsPdf.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">PDF</button>
        </a>
        <?php if($_SESSION["userRole"]=='admin'){ ?>
                <a href="addSectionForum.php"><i class="bi bi-plus-circle-fill fs-1"></i></a>
        <?php } ?>
    </center>
    <br>
    <div class="container border w-50">      
        <table class="table table-striped-columns" id="table">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable(document.getElementById('table'), {pageLength: 2 });
    });
</script>