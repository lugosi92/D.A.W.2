<?php
  $x=10;	   $y=20;	// variables globales
  
  function ambito() {
     $x=1;   $y=2;		// variables locales
     echo "Variables locales a la función:  <br>";
     echo "x = $x  <br>";     echo "y = $y  <br>";
     echo "Variables globales:  <br>";
     echo "x = $GLOBALS[x]   y = $GLOBALS[y]  <br>";
  } 
  ambito();
?>
