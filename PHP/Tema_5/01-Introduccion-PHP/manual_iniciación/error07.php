<?php
  class Saludar { 
    public function hola() { 
        echo "HOLA"; 
    } 

  } 

  class Llamar {
   	public function llamar(){
	    Saludar::hola();  
	}
  }  
    // llamada estática a un método no estático
    Llamar::llamar();
?>