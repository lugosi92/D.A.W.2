<?php
class Alumno{
    public $nombre;
    public $direccion;
    public $localidad;
    public $dni;

    public function __construct($nombre, $direccion, $localidad, $dni)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->dni = $dni;
    }
}