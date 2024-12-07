<?php

$alumno = array(
    "nombre" => "José",
    "apellidos" => "Martínez Roca",
    "telefono" => "96 361 66 54",
    "direccion" => "C/ Arco del triunfo 13",
    "dni" => "22 111 055",
    "num_matricula" => null,
    "facultad" => "Facultad Informática",
    "curso" => "5"
);

end($alumno);

while(current($alumno) !== false){
    echo current($alumno). "<br>";
    prev($alumno);
}

?>
