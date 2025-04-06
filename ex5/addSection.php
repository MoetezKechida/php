<?php
include_once "addSectionForum.php";
include_once "Sections.php";

$designation=$_POST['designation'];
$description=$_POST['description'];

Sections::addSection($designation, $description);
header("Location: ./sectionList.php");

?>