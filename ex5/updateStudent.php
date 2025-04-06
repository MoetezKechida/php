<?php

include_once "Students.php";

$id = $_GET['id'];
$image = $_FILES['image'];
$section=$_POST["section"];
if(isset($_POST["sectionCheckBox"])){
    Students::updateStudentSection($id, $section);
}
if(isset($_POST["imageCheckBox"])){
    $uploadDir = './uploads/';
    $fileName = basename($image['name']); 
    $filePath = $uploadDir . $fileName;
    move_uploaded_file($image['tmp_name'], $filePath);
    Students::updateStudentImage($id, $fileName);
}
header("Location: ./studentList.php");



?>