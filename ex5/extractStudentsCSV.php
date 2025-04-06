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

$parameters = "";
if (isset($_GET['idSection'])){
    $parameters = "?idSection=$_GET[idSection]";
}
else if (isset($_GET['filter'])){
    $parameters = "?filter=$_GET[filter]";
}
if(count($students) > 0){
    header('Content-Type: text/csv');
    header('Content-Disposition: attachement;filename="students.csv"');

    $output = fopen('php://output', 'w');

    $columns = array_keys($students[0]);
    fputcsv($output, $columns);

    foreach($students as $student){
        $student['section'] = Sections::getSection($student['section'])['designation'];
        fputcsv($output, $student);
    }

    fclose($output);
    exit;
}
header("Location: ./studentList.php$parameters");

?>