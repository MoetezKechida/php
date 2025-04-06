<?php
include_once "addStudentForum.php";
include_once "Students.php";


$name=$_POST['StudentName'];
$birthday=$_POST['birthday'];
$image = $_FILES['image'];
$section=$_POST["Section"];


$uploadDir = './uploads/';
$fileName = basename($image['name']); 
$filePath = $uploadDir . $fileName;
move_uploaded_file($image['tmp_name'], $filePath);

Students::addStudent($name, $birthday, $fileName, $section);

header("Location: ./studentList.php");

?>