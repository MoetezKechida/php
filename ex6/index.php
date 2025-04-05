<?php

include_once "Repository.php";

$repo = new Repository("utilisateur");
echo ($repo->findById(1))["email"];

echo "<br>";

echo ($repo->findAll())[0]["email"];

echo "<br>";

echo $repo->create(array("username" => "mo3tazz", "email" => "mo3tazz@gmail.ucar.tn", "password" => "thekiller", "role" => "admin")) ;

echo "<br>";

echo $repo->delete(2);

?>