<?php
session_start();

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

<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php" style="opacity:1" class="text-white text-decoration-none">Home</a>
        <a href="./studentList.php" class="text-white text-decoration-none">Students List</a>
        <a href="./sectionList.php" class="text-white text-decoration-none">Sections List</a>
        <a href="./index.php" class="text-white text-decoration-none">Logout</a>
    </header>
    <h1>
        Hello, PHP LOVERS! Welcome to your administration Platform
    </h1>
</body>