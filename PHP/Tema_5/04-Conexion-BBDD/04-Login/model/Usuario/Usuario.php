<?php
class Usuario{
    public $id;
    public $usuario;
    public $password;

    public function __construct($usuario, $password)
    {
        $this->usuario = $usuario;
        $this->password = $password;
    }
}