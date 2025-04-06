<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

include_once "Students.php";
include_once "Sections.php";

session_start();

$sections=Sections::getAll();

if(count($sections) > 0){
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
                    <th>designation</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($sections as $section){
        $html .= '<tr>
                    <td>' . $section['id'] . '</td>
                    <td>' . $section['designation'] . '</td>
                    <td>' . $section['description'] . '</td>
                    </tr>';
    }

    $html .= '</tbody>
        </table>
    </body>
    </html>';
    $dompdf->loadHtml($html);

    $dompdf->render();

    $dompdf->stream('sections.pdf', array('Attachment' => 0));
}
?>