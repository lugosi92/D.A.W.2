<?php
function comprobar_sesion() {
    if (!isset($_SESSION['correo'])) {
        header("Location: login.php");
        exit;  // Importante para evitar que el código siga ejecutándose
    }
}
