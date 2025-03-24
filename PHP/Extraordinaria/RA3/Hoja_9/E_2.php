<?php

class Empleado extends Persona{
    private $sueldo;
    private $antiguedad;

    function __construct($DNI, $nombre, $apellido, $sueldo, $antiguedad){
        parent::__construct($DNI, $nombre, $apellido);
        $this->sueldo = $sueldo;
        $this->antiguedad = $antiguedad;
    }

    public function incrementar_sueldo(){
        //Incrementar sueldo un 10% 
        $sueldoIncrementado = $sueldo + ($sueldo * 0.1);

        return $sueldoIncrementado;
    }

    public function incrementar_antigudad(){
        $antiguedad++;
        return $antiguedad;
    }

    public function visualizar_sueldo(){
        return "El sueldo es: " . $sueldo;
    }

    public function visualizar_antigueedad(){
        return "Antiguedad: " . $antiguedad;
    }


}