<!-- 
Crear una clase llamada Empleado que herede de la clase Persona añadiendo las propiedades sueldo y
antigüedad. Definir un constructor que inicialice todas las propiedades del empleado. Añadir los métodos
de incrementar_sueldo (un porcentaje), incrementar antigüedad, visualizar sueldo, visualizar antigüedad.
Reescribir el método visualizar de la clase Persona para visualizar el empleado. 
Modificar la clase Empleado para que la propiedad sueldo esté protegida. 
Definir un objeto de la clase Empleado, llamar a sus métodos e intentar modificar el sueldo y la edad. 
Definir un método que visualice un mensaje si debe pagar o no impuestos extra
(si el sueldo supera los 3.000 euros).  
-->

<?php
include 'Persona.php';
class Empleado extends Persona
{
    protected $sueldo;
    private $antiguedad;
    private const CANTIDAD_PAGAR_IMPUESTOS = 3000;

    function __construct($DNI, $nombre, $apellido, $sueldo, $antiguedad)
    {
        parent::__construct($DNI, $nombre, $apellido);
        $this->sueldo = $sueldo;
        $this->antiguedad = $antiguedad;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;
    }

    public function incrementarSueldo($porcentaje)
    {
        $cantidad = $this->sueldo * $porcentaje / 100;
        $this->setSueldo($this->sueldo + $cantidad);
    }

    public function incrementarAntiguedad($cantidad)
    {
        $this->setAntiguedad($this->antiguedad + $cantidad);
    }

    public function verEmpleadoImpuestos(){
        return $this->sueldo > self::CANTIDAD_PAGAR_IMPUESTOS;
    } 
    
    public function mensajePagarImpuestos()
    {
        return $this->verEmpleadoImpuestos() ? "Debe pagar impuestos extra" : "No debe de pagar impuestos extra";
    }

    public function __toString()
    {
        return parent::__toString() .
            "Sueldo: " . $this->sueldo . "€<br>" .
            "Antigüedad: " . $this->antiguedad . "<br>";
    }
}
