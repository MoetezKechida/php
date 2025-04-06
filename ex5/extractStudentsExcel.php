<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $columns = array_keys($students[0]);
    $col = 1;
    foreach ($columns as $column) {
        $sheet->setCellValue(chr(64+$col)."1",$column);
        $col++;
    }
    $rowNum = 2;
    foreach ($students as $student) {
        $colNum = 1;
        $student['section'] = Sections::getSection($student['section'])['designation'];
        foreach ($student as $info) {
            $sheet->setCellValue(chr(64+$colNum).$rowNum, $info);
            $colNum++;
        }
        $rowNum++;
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="students.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
header("Location: ./studentList.php$parameters");
?>