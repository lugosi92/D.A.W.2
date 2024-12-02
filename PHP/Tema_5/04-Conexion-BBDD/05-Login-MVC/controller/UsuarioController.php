<?php
require_once __DIR__ . '/../model/Usuario/UsuarioMysqli.php';

class UsuarioController
{

    public function showUserByCredentials($name, $password)
    {
        $credentials = new UsuarioObject(null, $name, $password);
        $user = new UsuarioMysqli($credentials);
        return $user->getUserByCredentials();
    }

    public function createUser($id = null, $name, $password)
    {
        $credentials = new UsuarioObject($id, $name, $password);
        $newUser = new UsuarioMysqli($credentials);

        return $newUser->insertUser();
    }
}
