<?php

include_once "Students.php";

$id = $_GET["id"];

Students::deleteStudent($id);

header("Location: ./studentList.php");

?>