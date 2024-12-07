<?php
    $cadena = "ARROYO SALA MARTÍN MUÑOZ";
    $sub = substr ($cadena, 12);
	$cmp = strcmp ($cadena, $sub);

    echo  "\$cadena = $cadena  <br>";
    echo  "\$sub (12->) = $sub  <br>";
	
	if ($cmp>0)
		echo "$cadena es mayor que $sub";
	else if ($cmp<0)
		echo "$cadena es menor que $sub";
	else
		echo "Las cadenas son iguales";	
?>
