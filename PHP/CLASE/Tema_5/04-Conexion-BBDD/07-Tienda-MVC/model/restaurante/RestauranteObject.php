<?php
class RestauranteObject {
    private $id;
    private $correo;
    private $clave;
    private $pais;
    private $cp;
    private $ciudad;
    private $direccion;

    public function __construct($id = null, $correo = null, $clave = null, $pais = null, $cp = null, $ciudad = null, $direccion = null)
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->pais = $pais;
        $this->cp = $cp;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
    }
    
    // Getter y Setter para $id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para $correo
    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    // Getter y Setter para $clave
    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    // Getter y Setter para $pais
    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    // Getter y Setter para $cp
    public function getCp()
    {
        return $this->cp;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    // Getter y Setter para $ciudad
    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    // Getter y Setter para $direccion
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
}
?>
