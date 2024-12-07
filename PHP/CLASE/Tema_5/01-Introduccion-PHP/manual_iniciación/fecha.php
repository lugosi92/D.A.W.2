<?php
  $fechaSis = date (" l d/m/Y");
  $cadena = "11:40am April 16 2011";
  $fecha1=strtotime ($cadena);
  $fecha2=mktime(14, 0, 0, 7, 10, 2014);
  
  echo 'Hoy es'. $fechaSis. '<br>';
  echo 'La hora es '.date("h:i:sa").'<br>';
  echo '<br> Formato completo RFC: <br>';
  echo date(DATE_RFC2822);
  echo '<br><br>Joel nació el '.date("d/m/Y h:i:sa", $fecha1);
  echo '<br><br>Las vacaciones comienzan el'.date("d/m/Y h:i:sa", $fecha2);
?>