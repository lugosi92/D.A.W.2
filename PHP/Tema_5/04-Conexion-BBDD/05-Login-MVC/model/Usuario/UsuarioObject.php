<?php
class UsuarioObject{
    private $id;
    private $usuario;
    private $password;

    public function __construct($id = null, $usuario=null, $password=null)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
    }
    
    // Getter para $id
    public function getId()
    {
        return $this->id;
    }

    // Setter para $id
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    // Setter para $usuario
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    // Getter para $password
    public function getPassword()
    {
        return $this->password;
    }

    // Setter para $password
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
}