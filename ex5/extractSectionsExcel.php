<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once "Students.php";
include_once "Sections.php";

session_start();

$sections=Sections::getAll();

if(count($sections) > 0){

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $columns = array_keys($sections[0]);
    $col = 1;
    foreach ($columns as $column) {
        $sheet->setCellValue(chr(64+$col)."1",$column);
        $col++;
    }
    $rowNum = 2;
    foreach ($sections as $section) {
        $colNum = 1;
        foreach ($section as $info) {
            $sheet->setCellValue(chr(64+$colNum).$rowNum, $info);
            $colNum++;
        }
        $rowNum++;
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="sections.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
header("Location: ./sectionList.php");
?>