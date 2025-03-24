<?php
$array = ["a" => "manzana", "b" => "banana", "c" => "cereza", "d" => "durazno"];

// 1. key() - Devuelve la clave del elemento actual en un array
echo "key: " . key($array) . "\n";
// key: a

// 2. reset() - Mueve el puntero al primer elemento de un array
reset($array);
echo "reset: " . current($array) . "\n";
// reset: manzana

// 3. current() - Devuelve el elemento actual de un array
echo "current: " . current($array) . "\n";
// current: manzana

// 4. prev() - Mueve el puntero un paso atrás y devuelve el valor
prev($array);
echo "prev: " . current($array) . "\n";
// prev: (no se puede mover atrás, el primer elemento fue el puntero)

// 5. end() - Mueve el puntero al último elemento del array
end($array);
echo "end: " . current($array) . "\n";
// end: durazno

// 6. next() - Mueve el puntero al siguiente elemento y devuelve el valor
next($array);
echo "next: " . current($array) . "\n";
// next: (no hay más elementos después del último)
?>
