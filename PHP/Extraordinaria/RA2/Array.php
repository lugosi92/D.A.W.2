<?php
$array = [1, 2, 3, 4, 5];
$multi_array = [
    ["id" => 1, "name" => "Juan", "age" => 25],
    ["id" => 2, "name" => "Ana", "age" => 30],
    ["id" => 3, "name" => "Luis", "age" => 28]
];

// 1. array_values() - Devuelve los valores de un array sin claves
echo "array_values: ";
print_r(array_values($array));
// array_values: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )

// 2. array_keys() - Devuelve todas las claves de un array
echo "array_keys: ";
print_r(array_keys($array));
// array_keys: Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 )

// 3. array_column() - Devuelve una columna específica de un array multidimensional
echo "array_column: ";
print_r(array_column($multi_array, "name"));
// array_column: Array ( [0] => Juan [1] => Ana [2] => Luis )

// 4. array_slice() - Extrae una parte de un array
echo "array_slice: ";
print_r(array_slice($array, 1, 3)); // Extrae desde el índice 1, 3 elementos
// array_slice: Array ( [0] => 2 [1] => 3 [2] => 4 )

// 5. array_push() - Agrega uno o más elementos al final de un array
array_push($array, 6, 7);
echo "array_push: ";
print_r($array);
// array_push: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 )

// 6. array_pop() - Extrae el último elemento de un array
$last_item = array_pop($array);
echo "array_pop: " . $last_item . "\n";
// array_pop: 7

// 7. array_unshift() - Agrega uno o más elementos al inicio de un array
array_unshift($array, 0);
echo "array_unshift: ";
print_r($array);
// array_unshift: Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 )

// 8. array_shift() - Extrae el primer elemento de un array
$first_item = array_shift($array);
echo "array_shift: " . $first_item . "\n";
// array_shift: 0
?>
