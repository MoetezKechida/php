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
        text-decoration: None;
        color:white;
        opacity:0.7;
    }
</style>
<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php" style="opacity:1">Home</a>
        <a href="./studentList.php">Liste des Etudiants</a>
        <a href="./sectionList.php">Liste des Section</a>
        <a href="./index.php">Logout</a>
    </header>
    <h1>
        Hello, PHP LOVERS! Welcome to your administration Platform
    </h1>
</body>