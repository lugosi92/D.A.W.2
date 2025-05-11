<?php

require_once "conexion.php";

function comprobar_usuario($usuario, $clave) {
    global $bd;  

    $stmt = $bd->prepare("SELECT * FROM restaurante WHERE correo = :correo AND clave = :clave");
    $stmt->bindParam(':correo', $usuario);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

    // Obtiene el resultado como array asociativo si existe
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);


      if ($resultado) {

        $_SESSION['correo'] = $resultado['correo']; 
        $_SESSION['codRestaurante'] = $resultado['codRestaurante']; 
        $_SESSION['es_admin'] = $resultado['es_admin'];
        
        return $resultado; 
    } else {
        return false; 
    }
}

?>