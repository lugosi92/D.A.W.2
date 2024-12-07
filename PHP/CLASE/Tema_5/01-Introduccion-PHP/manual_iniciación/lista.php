<?php
  $lista=array(array('nombre','edad'), array('Pepe', 50));
  echo "Hola $lista[1][0] <br>";		// confusión del parser
  
  echo 'Hola ' . $lista[1][0] . '<br>';	// solución con .
  echo "Hola {$lista[1][0]} <br>";		// solución con {}
?>