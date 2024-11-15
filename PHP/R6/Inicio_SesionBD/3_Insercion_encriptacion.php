<?php
// Conexion
$mysqli = new mysqli("localhost", "root", "", "clientes");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$contraseña = password_hash("1234", PASSWORD_DEFAULT);
$contraseña1 = password_hash("5678", PASSWORD_DEFAULT);
$contraseña2 = password_hash("9876", PASSWORD_DEFAULT);
$contraseña3 = password_hash("5432", PASSWORD_DEFAULT);
// INSERT
$query = "INSERT INTO `usuario` (`usuario`, `contraseña`) VALUES
        ('Neil Molina', '$contraseña'),
        ('Khaled Beno', '$contraseña1'),
        ('Jesus Villa', '$contraseña2'),
        ('Natalia Garcia', '$contraseña3')";

$resultado = $mysqli->query($query);

?>