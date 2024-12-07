<?php
    function  poner_modulo ( )  {	
		for ($i=0; $i<func_num_args(); $i++) {
	        echo func_get_arg($i)."\n";
			}
		echo "<br>";	
		}
    poner_modulo ('DES');	// 1 parámetro
    poner_modulo ('Desarrollo', 'Entorno', 'Servidor'); // 3 parámetros
?>
