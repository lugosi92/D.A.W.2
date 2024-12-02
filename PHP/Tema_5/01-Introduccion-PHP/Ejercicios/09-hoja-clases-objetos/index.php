<?php
include 'class/Empleado.php';
include 'class/Empresa.php';
// Ejercicio 2: Declarar la clase Empleado
$empleado = new Empleado("55555555X", "Pepe", "Gonzalez", 2000, 2);
$empleado2 = new Empleado("12345678Z", "Ana", "Martínez", 2500, 5);
$empleado3 = new Empleado("98765432L", "Carlos", "Pérez", 3000, 10);
$empleado4 = new Empleado("65432198M", "Laura", "García", 2200, 3);
$incrementoSueldo = 10;
$incrementoAntiguedad = 2;
echo "<br> <h1>Ejercicio 2</h1>";
echo $empleado->__toString();
$empleado->incrementarSueldo($incrementoSueldo);
echo "Se ha incrementado un $incrementoSueldo%: " . $empleado->getSueldo() . "€<br>";
$empleado->incrementarAntiguedad($incrementoAntiguedad);
echo "Se ha incrementado un $incrementoAntiguedad años: " . $empleado->getAntiguedad() . "<br>";
echo $empleado->mensajePagarImpuestos();

// Ejercicio 3
echo "<br> <h1>Ejercicio 3</h1>";
$empresa = new Empresa("Microsoft", "Yo", "13213P", "Calle", "Pozuelo", "28223", "ES", array());
$empresa->add_empleado($empleado);
$empresa->add_empleado($empleado2);
$empresa->add_empleado($empleado3);
$empresa->add_empleado($empleado4);

echo "<br> <h2>Array orden alfabético</h2>";
$empresa->visualizar_empleados(true, false);
echo "<br> <h2>Menos antiguos</h2>";
$empresa->listar_menos("Antiguedad",true);
echo "<br> <h2>Menos sueldo</h2>";
$empresa->listar_menos("Sueldo", true);
echo "<br> <h2>Sueldo medio</h2>";
echo $empresa->ver_media("Sueldo");
echo "<br> <h2>Antiguedad media</h2>";
echo $empresa->ver_media("Antiguedad");
echo "<br> <h2>Pagan impuestos</h2>";
echo $empresa->pagan_impuestos();

