<?php
header("Content-Type: application/json; charset=UTF-8");

$cat1 = array("cod" => 1, "nombre" => "Comida");
$cat2 = array("cod" => 2, "nombre" => "Bebida");

$array = array($cat1, $cat2);

echo json_encode($array);
?>
