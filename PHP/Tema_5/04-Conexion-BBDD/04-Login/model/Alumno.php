<?php
class Alumno{
    public $id;
    public $nombre;
    public $direccion;
    public $localidad;
    public $dni;

    public function __construct($id=null, $nombre=null, $direccion=null, $localidad=null, $dni=null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->dni = $dni;
    }
}