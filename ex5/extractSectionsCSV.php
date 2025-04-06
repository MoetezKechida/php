<?php

include_once "Students.php";
include_once "Sections.php";
session_start();

if(isset($_GET['filter'])){
    $sections=Sections::getSectionsByFilter($_GET['filter']);
}else{
    $sections=Sections::getAll();
}

$parameters = "";
if (isset($_GET['filter'])){
    $parameters = "?filter=$_GET[filter]";
}

if(count($sections) > 0){
    header('Content-Type: text/csv');
    header('Content-Disposition: attachement;filename="sections.csv"');

    $output = fopen('php://output', 'w');

    $columns = array_keys($sections[0]);
    fputcsv($output, $columns);

    foreach($sections as $section){
        fputcsv($output, $section);
    }

    fclose($output);
    exit;
}
header("Location: ./sectionList.php$parameters");

?>