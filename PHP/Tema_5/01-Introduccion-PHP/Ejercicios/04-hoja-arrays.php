<!-- 
    Ejercicio 1:
    Obtener dos arrays escalares, uno con los valores y otro con los índices
-->

<?php
$alumno = array(
    "nombre" => "José",
    "apellidos" => "Martínez Roca",
    "telefono" => "96 361 66 54",
    "direccion" => "C/ Arco del triunfo 13",
    "dni" => "22 111 055",
    "num_matricula" => "6666",
    "facultad" => "Facultad Informática",
    "curso" => "5"
);
$arrKey = array();
$arrValue = array();
$i = 0;

foreach ($alumno as $key => $item) {
    $arrValue[$i] = $item;
    $arrKey[$i] = $key;
    $i++;
}

echo "<h1>Ejercicio 1: </h1> <br/>";
echo "Primer elemento del array escalar de valores: $arrValue[0] <br>";
echo "Primer elemento del array escalar de keys: " . $arrKey[0];
?>

<!-- 
    Ejercicio 2:
    Crea un array de dos dimensiones de manera que en una dimensión contenga el tipo
    de colores (fuerte o suave) y en la otra 3 colores de cada tipo. Visualiza una tabla como
    la siguiente recorriendo el array:
    
-->

<?php
$arrayColors = array(
    "Colores fuertes" => array(
        "rojo" => "FF0000",
        "verde" => "00FF00",
        "azul" => "0000FF"
    ),
    "Colores suaves" => array(
        "rosa" => "FE9ABC",
        "amarillo" => "FDF189",
        "malva" => "BC8C8C"
    )
);

echo "<h1>Ejercicio 2: </h1> <br/>";
echo "<table>
            <tbody>";
foreach ($arrayColors as $key => $type) {
    echo "<tr>
            <td>$key: </td>";
    foreach ($type as $keyColor => $colorCode) {
        echo "<td style=\"background-color: $colorCode\">$keyColor:  $colorCode </td>";
    }
    echo "</tr>";
}
echo "</tbody>
            </table>";
?>

<!-- 
    Ejercicio 3:
    Visualiza los siguientes arrays mediante el correspondiente código php:    
-->
<?php
echo "<h1>Ejercicio 3: </h1> <br/>";
$miFecha = array(
    array(
        array("13 de enero de 2015", "11 de febrero de 2018"),
        array("13 de enero de 2020", "11 de febrero de 2015"),
    ),
    array(
        array("3 de agosto de 2017", "1 de octubre de 2016"),
        array("3 de agosto de 2013", "1 de octubre de 2019"),
    ),
    array(
        array("10 de junio de 2020", "11 de marzo de 2019"),
    ),
    array(
        array("22 de marzo de 2020", "28 de mayo de 2019"),
        array("22 de marzo de 2019", "28 de mayo de 2018"),
        array("22 de marzo de 2018", "28 de mayo de 2017"),
        array("22 de marzo de 2017", "28 de mayo de 2016"),
    )
);
echo "a) <br>";
foreach ($miFecha as $item) {
    foreach ($item as $element) {
        foreach ($element as $date) {
            echo $date . '; ';
        }
        echo '<br>';
    }
}

$equipo_futbol = array(
    array("Rooney", "Chicharito", "Gigs"),
    array("Suarez"),
    array("Torres", "Terry", "Etoo")
);

echo "<br> b) <br>";
foreach ($equipo_futbol as $players) {
    foreach ($players as $player) {
        echo $player . ' ';
    }
    echo '<br>';
}

$datos = array(
    array(
        array(0, 0, 0),
        array(0, 0, 1),
        array(0, 0, 2)
    ),
    array(
        array(0, 1, 0),
        array(0, 1, 1),
        array(0, 1, 2)
    ),
    array(
        array(0, 2, 0),
        array(0, 2, 1),
        array(0, 2, 2)
    )
);
echo "<br> c) <br>";
foreach ($datos as $item) {
    foreach ($item as $numbers) {
        foreach ($numbers as $number) {
            echo $number . ' ';
        }
        echo '<br>';
    }
}

$supermercado = array(
    "Electrodomesticos" => array("Televisor", "Heladera"),
    "alimentos" => array("Carne", "Leche", "Verduras")
);

echo "<br> d) <br>";
foreach ($supermercado as $key => $products) {
    echo $key . ": ";
    foreach ($products as $product) {
        echo $product . ', ';
    }
    echo '<br>';
}

$productos = array(
    "procesador" => array(
        "AMD" => "K7 XP 1800",
        "PENTIUM" => "IV 2,5 Ghz"
    ),
    "disco_duro" => array(
        "SEAGATE" => "40GB 10000 rpm",
        "SAMSUNG" => "40GB 7200 rpm",
        "WESTERN_DIGITAL" => "60GB 7200 rmp 8MB caché"
    )
);
echo "<br> e) <br>";

foreach ($productos as $key_item => $item) {
    echo $key_item . ': <br>';
    foreach ($item as $key_product => $product) {
        echo "  ";
        echo "$key_product: $product <br>";
    }
}

echo "<br> e) <br>";

// $productos[“procesador”][“AMD”][0]=”K7 XP 1900”;
// $productos[“procesador”][“AMD”][1]=”K7 XP 1800”;
// $productos[“procesador”][“AMD”][2]=”K7 XP 1700”;
// $productos[“procesador”][“PENTIUM”][0]=”IV 2,5 Ghz”;
// $productos[“procesador”][“PENTIUM”][1]=”IV 2,4 Ghz”;
// $productos[“procesador”][“PENTIUM”][2]=”IV 2,3 Ghz”;
// $productos[“procesador”][“PENTIUM”][3]=”IV 2,2 Ghz”;
// $productos[“disco_duro”][“SEAGATE”][0]=” 40GB 10000 rpm”;
// $productos[“disco_duro”][“SEAGATE”][1]=” 80GB 7200 rpm”;
// $productos[“disco_duro”][“SEAGATE”][2]=” 160GB 7200 rpm”;
// $productos[“disco_duro”][“SAMSUNG”][0]=” 40GB 7200 rpm”;
// $productos[“disco_duro”][“WESTERN_DIGITAL”][0]=” 60GB 7200 rpm 8MB
// cache”;
// $productos[“disco_duro”][“WESTERN_DIGITAL”][1]=” 80GB 10000 rpm 16MB
// cache”;

$productos = array(
    "procesador" => array(
        "AMD" => [
            "K7 XP 1900",
            "K7 XP 1800",
            "K7 XP 1700"
        ],
        "PENTIUM" => [
            "IV 2,5 Ghz",
            "IV 2,4 Ghz",
            "IV 2,3 Ghz",
            "IV 2,2 Ghz"
        ]
    ),

    "disco_duro" => array(
        "SEAGATE" => [
            "40GB 10000 rpm",
            "80GB 7200 rpm",
            "160GB 7200 rpm"
        ],
        "SAMSUNG" => [
            "40GB 7200 rpm"
        ],
        "WESTERN_DIGITAL" => [
            "60GB 7200 rpm 8MB cache",
            "80GB 10000 rpm 16MB cache"
        ]
    )
);

foreach ($productos as $keyTypeProduct => $typeProducts){
    echo $keyTypeProduct . ': <br>';
    foreach($typeProducts as $keyItems => $items){
        echo $keyItems . ': <br>';
        foreach($items as $keyProduct => $product){
            echo $product . '<br>';
        }
    }
}
?>