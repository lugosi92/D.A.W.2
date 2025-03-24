<?php
$array = [3, 1, 4, 5, 2];
$assoc_array = ["a" => 3, "b" => 1, "c" => 5, "d" => 4];
$multi_array = ["item100", "item1", "item20", "item3", "item356", "item357"];

// 1. sort() - Ordena un array en orden ascendente
sort($array);
echo "sort: ";
print_r($array);
// sort: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )

// 2. rsort() - Ordena un array en orden descendente
rsort($array);
echo "rsort: ";
print_r($array);
// rsort: Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 )

// 3. arsort() - Ordena un array asociativo en orden descendente manteniendo claves
arsort($assoc_array);
echo "arsort: ";
print_r($assoc_array);
// arsort: Array ( [c] => 5 [d] => 4 [a] => 3 [b] => 1 )

// 4. ksort() - Ordena un array por clave en orden ascendente
ksort($assoc_array);
echo "ksort: ";
print_r($assoc_array);
// ksort: Array ( [a] => 3 [b] => 1 [c] => 5 [d] => 4 )

// 5. krsort() - Ordena un array por clave en orden descendente
krsort($assoc_array);
echo "krsort: ";
print_r($assoc_array);
// krsort: Array ( [d] => 4 [c] => 5 [b] => 1 [a] => 3 )

// 6. shuffle() - Mezcla los elementos de un array aleatoriamente
shuffle($multi_array);
echo "shuffle: ";
print_r($multi_array);
// shuffle: Array ( [0] => item3 [1] => item357 [2] => item20 [3] => item1 [4] => item100 [5] => item356 )

// 7. natcasesort() - Ordena un array en orden natural sin distinguir mayúsculas y minúsculas
natcasesort($multi_array);
echo "natcasesort: ";
print_r($multi_array);
// natcasesort: Array ( [0] => item1 [1] => item3 [2] => item20 [3] => item100 [4] => item356 [5] => item357 )

// 8. natsort() - Ordena un array en orden natural
natsort($multi_array);
echo "natsort: ";
print_r($multi_array);
// natsort: Array ( [0] => item1 [1] => item3 [2] => item20 [3] => item100 [4] => item356 [5] => item357 )
?>
