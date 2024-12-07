<?php
    $cadena = 'ARROYO SALA MARTÍN MUÑOZ';
    $array = explode (' ', $cadena);
	$cadena2 = implode (', ', $array);
	
	var_dump ($cadena); echo '<br> explode() <br>';
	print_r ($array); echo '<br> implode() <br>';
	var_dump ($cadena2);
?>