<?php
  $x=10;	$y=20;	// ámbito global
  
  function ambito() {
    $x=1;	$y=2;	// ámbito local a la función
  
    echo "Variables locales a la función:  <br>";
    echo "x = $x  <br>";    echo "y = $y  <br>";
  } 
  ambito();
  echo "Variables globales:  <br>";
    echo "x = $x  <br>";	echo "y = $y  <br>";
?>
