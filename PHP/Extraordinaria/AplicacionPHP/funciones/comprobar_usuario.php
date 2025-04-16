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

      // Si el usuario existe y la clave es correcta
      if ($resultado) {
        // Guardamos el correo y codRestaurante en la sesión
        $_SESSION['correo'] = $resultado['correo']; // Guardamos el correo
        $_SESSION['codRestaurante'] = $resultado['codRestaurante']; // Guardamos el código del restaurante
        
        return $resultado; // Devolvemos el resultado si es necesario
    } else {
        return false; // Si no se encuentra el usuario, retornamos false
    }
}

?>