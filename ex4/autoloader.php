<?php
function load(string $className)
{
    include_once "$className.php";
}
spl_autoload_register('load');
?>