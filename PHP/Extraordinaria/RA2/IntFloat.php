<?php
$str = "Hola Mundo! Bienvenido a PHP.";
$str2 = "Hola Mundo!";
$num = 123.456;

// 1. strlen()
echo "strlen: " . strlen($str) . "\n";
// strlen: 30

// 2. count_chars() (Devuelve la cantidad de caracteres únicos en la cadena)
echo "count_chars (total caracteres únicos): " . count_chars($str, 3) . "\n";
// count_chars: !.BPHMaceidlnouVb

// 3. strpos()
echo "strpos: " . strpos($str, "Mundo") . "\n";
// strpos: 5

// 4. strrpos()
echo "strrpos: " . strrpos($str, "o") . "\n";
// strrpos: 24

// 5. strncmp() (Compara los primeros 5 caracteres de dos cadenas)
echo "strncmp: " . strncmp($str, $str2, 5) . "\n";
// strncmp: 0 (porque "Hola " es igual en ambas)

// 6. strcmp()
echo "strcmp: " . strcmp($str, $str2) . "\n";
// strcmp: 1 (porque $str es mayor que $str2)

// 7. strnatcmp()
echo "strnatcmp: " . strnatcmp("archivo10", "archivo2") . "\n";
// strnatcmp: 1 (porque "archivo2" viene antes que "archivo10" en orden natural)

// 8. strcspn() (Devuelve la longitud antes de encontrar un carácter)
echo "strcspn: " . strcspn($str, "o") . "\n";
// strcspn: 1 (porque la primera 'o' está en la posición 1)

// 9. round()
echo "round: " . round($num) . "\n";
// round: 123

// 10. rand()
echo "rand: " . rand(1, 100) . "\n";
// rand: (número aleatorio entre 1 y 100)

// 11. time()
echo "time: " . time() . "\n";
// time: (un número grande representando el timestamp actual)

// 12. strtotime()
echo "strtotime: " . strtotime("2025-03-23") . "\n";
// strtotime: (timestamp correspondiente a la fecha)
?>
