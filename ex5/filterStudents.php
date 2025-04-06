<?php

$filter = $_POST['filter'];

header("Location: ./studentList.php?filter=$filter");

?>