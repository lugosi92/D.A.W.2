<?php

$alumno=array(
    "nombre" => "José",
    "apellidos" => "Martínez Roca",
    "telefono" => "96 361 66 54",
    "direccion" => "C/ Arco del triunfo 13",
    "dni" => "22 111 055",
    "num_matricula" => "6666",
    "facultad" => "Facultad Informática",
    "curso" => "5"
); 

$valores = array_values($alumno);
$claves= array_keys($alumno);

echo "Valores: <br>";
print_r($valores);

echo"<br>";
echo"<br>";

echo "Claves: ";
print_r($claves);
