<?php
session_start();
require_once 'funciones/comprobar_sesion.php';
comprobar_sesion();
?>
<header style="text-align: center; padding: 10px; background-color: #f4f4f9;">
    <p>Usuario: <?php echo $_SESSION['correo']; ?></p>
    <nav>
        <a href="categorias.php" style="margin: 0 10px;">Home</a>
        <a href="carrito.php" style="margin: 0 10px;">Ver carrito</a>
        <a href="logout.php" style="margin: 0 10px;">Cerrar sesión</a>
    </nav>
</header>