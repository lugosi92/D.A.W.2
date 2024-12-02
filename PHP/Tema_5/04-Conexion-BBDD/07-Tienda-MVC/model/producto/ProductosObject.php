<?php
class ProductoObject
{
    private $id;
    private $nombre;
    private $descripcion;
    private $peso;
    private $stock;
    private $categoria;

    // Constructor
    public function __construct($id = null, $nombre = null, $descripcion = null, $peso = null, $stock = null, $categoria = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->peso = $peso;
        $this->stock = $stock;
        $this->categoria = $categoria;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}

?>
