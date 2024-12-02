<?php
function comprobar_sesion()
{
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: views/auth/login.php?redirigido=true");
    } else {
        header("Location: views/main.php");
    }
}
