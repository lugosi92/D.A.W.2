<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: auth/login.php');
    exit;
} else {
    echo "Nombre: " . $_SESSION['user']['usuario'] . "<br>";
    echo "Contraseña: " . $_SESSION['user']['password'] . "<br>";
    echo "Rol: " . $_SESSION['user']['rol'] . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: auth/login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
</body>

</html>