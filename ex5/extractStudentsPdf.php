<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

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

if(count($students) > 0){
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf = new Dompdf($options);

    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Students List</title>
    </head>
    <body>
        <h1>Students List</h1>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($students as $student){
        $html .= '<tr>
                    <td>' . $student['id'] . '</td>
                    <td>' . $student['image'] . '</td>
                    <td>' . $student['name'] . '</td>
                    <td>' . $student['birthday'] . '</td>
                    <td>' . Sections::getSection($student['section'])['designation'] . '</td>
                    </tr>';
    }

    $html .= '</tbody>
        </table>
    </body>
    </html>';
    $dompdf->loadHtml($html);

    $dompdf->render();

    $dompdf->stream('students.pdf', array('Attachment' => 0));
}
?>