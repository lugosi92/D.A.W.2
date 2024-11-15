<?php

// PASSWORD HASH
echo "Cifrado 1" . "<br>";
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";

echo  "<br>";
echo  "<br>";

echo "Cifrado 2 (mejorado):" . "<br>";
$opciones = [
    'cost' => 12,
];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $opciones)."\n";

// PASSWORD VERIFY

$hash = '$2y$12$lIhnvxhan9qGzB1qUrApGuHFugQrN48em54eAt3t3eMZrHSpfI.O6';

echo  "<br>";
echo  "<br>";

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}

?>
