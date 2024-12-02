<?php
require_once __DIR__ . '/../model/Restaurante/RestauranteMysqli.php';

class RestauranteController
// poner luego un atributo modelo con un constructor
{

    public function showRestauranteByCredentials($name, $password)
    {
        $credentials = new RestauranteObject(null, $name, $password);
        $user = new RestauranteMysqli($credentials);
        return $user->getRestauranteByCredentenlials();
    }

    public function createRestaurante($id = null, $correo, $clave, $pais, $cp, $ciudad, $direccion)
    {
        $credentials = new RestauranteObject($id, $correo, $clave, $pais, $cp, $ciudad, $direccion);
        $newUser = new RestauranteMysqli($credentials);

        return $newUser->insertRestaurante();
    }
}
