<?php

include_once "Students.php";
include_once "Sections.php";
session_start();

$sections=Sections::getAll();

$parameters = "";

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
header("Location: ./sectionList.php");

?>