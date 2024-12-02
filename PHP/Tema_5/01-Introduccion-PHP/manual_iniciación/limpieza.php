<?php
    $cadena = " \0 \r \n  Limpieza  \n \r \0 ";
    $ltrim =ltrim($cadena);
	$rtrim = rtrim ($cadena);
	$trim = trim ($cadena);
       
	echo '$cadena = '; var_dump ($cadena); echo "<br>";
	echo '$ltrim = '; var_dump ($ltrim);echo "<br>";
	echo '$rtrim = '; var_dump ($rtrim);echo "<br>";
	echo '$trim = '; var_dump ($trim);echo "<br>";
?>
