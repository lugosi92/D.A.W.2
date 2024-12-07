<?php
  $var1 = 100; 				// variable declarada por valor
  $var2 = 100;				// variable declarada por valor
  $var3 = &$var2;			// variable declarada por referencia a $var2
  echo  "Comienzo: $var1, $var2, $var3 <br>";
  $var2 = 200;				// modifica el valor de $var2 y $var3
  echo "Asignar: var2 = $var2 <br>";
  echo "Fin: $var1, $var2, $var3";
?>
