<!-- 
    Ejercicio 1:
    Dado el array:
    Realiza un código php que busque el valor ‘Juan’ en el array con
    array_search() obteniendo la primera clave encontrada en caso de éxito.
    visualice todas las claves asociadas a Álvaro. 
-->

<?php
$array = array(
    'k0' => 'Juan',
    'k1' => 'Álvaro',
    'k2' => 'Maite',
    'k3' => 'Álvaro',
    'k4' => 'Juan',
    'k5' => 'Martina'
);

echo "<h1>Ejercicio 1: </h1> <br/>";
$key = array_search("Juan", $array);
echo "Primera clave con Juan: $key <br>";
$key = array_search("Álvaro", $array);
echo "Clave con Álvaro: $key <br>";
?>

<!-- 
    Ejercicio 2:
    Realiza un código php que busque el valor ‘Juan’ con in_array()
-->

<?php
echo "<h1>Ejercicio 2: </h1> <br/>";
echo in_array('Juan', $array); // devuelve un booleano
?>

<!-- 
    Ejercicio 3:
    A partir del array. Visualiza sus claves utilizando array_keys().
-->

<?php
$supermercado = array(
    "Electrodomesticos" => array(
        "Televisor",
        "Heladera"
    ),
    "alimentos" => array(
        "Carne",
        "Leche",
        "Verduras"
    )
);

echo "<h1>Ejercicio 3: </h1> <br/>";
foreach (array_keys($supermercado) as $key) {
    echo $key . ': <br>';
    foreach (array_keys($supermercado[$key]) as $key_product) {
        echo $key_product . '<br>';
    }
}
?>

<!-- 
    Ejercicio 4:
    A partir del array
    Recorrerlo del final al principio utilizando end(), while,
    y prev() y visualizar su contenido con current(). 
    A continuación recorrerlo del principio al final  utilizando reset(),while, 
    y next() y visualizar sus claves con  key(). ¿El valor null en num_matrícula
    provoca algún problema en alguno de los recorridos realizados? 
    -->

<?php
$alumno = array(
    "nombre" => "José",
    "apellidos" => "Martínez Roca",
    "telefono" => "96 361 66 54",
    "direccion" => "C/ Arco del triunfo 13",
    "dni" => "22 111 055",
    "num_matricula" => null,
    "facultad" => "Facultad Informática",
    "curso" => "5"
);
echo "<h1>Ejercicio 4: </h1> <br/>";
$mode = end($alumno); // Empezar el puntero en el último elemento del array
while($mode != null){
    $mode = current($alumno); 
    echo $mode . '<br>'; // imprimir el elemento actual que está en el puntero
    $mode = prev($alumno); // se mueve en el anterior elemento
}

?>

<!-- 
    Ejercicio 5: 
    A partir del array
    Obtén la columna de apellidos con array_colum()
-->


<?php
$registros = array(
    array(
        'id' => 2135,
        'nombre' => 'Juan',
        'apellido' => 'Díaz',
    ),     
    array(
        'id' => 3245,
        'nombre' => 'Sara',
        'apellido' => 'Sanz',
    ),     
    array(
        'id' => 5342,
        'nombre' => 'Jose',
        'apellido' => 'Rodríguez',
    ),     
    array(
        'id' => 5623,
        'nombre' => 'Pedro',
        'apellido' => 'Domínguez',
    )
);
$apellidos = array_column($registros, 'apellido');
echo "<h1>Ejercicio 5: </h1> <br/>";
foreach ($apellidos as $apellido){
    echo  $apellido. '<br>';
}
?>

<!-- 
    Ejercicio 6:
    Crea un array $pila que contenga varios DNI’s y utiliza las funciones array_pop() 
    y array_push() para apilar y desapilar elementos. Prueba a obtener el primer elemento 
    de la pila con array_shift(). 

-->
<?php
$pila = array("12345678A", "87654321B", "11223344C", "44332211D", "55667788E");
echo "<h1>Ejercicio 6: </h1> <br/>";
echo "El array está así: <br>";
foreach($pila as  $element){
    echo $element . '<br>';
}
// pop
$pop_element = array_pop($pila); // 55667788E
echo '<br> Se hace pop ha este elemento: '.  $pop_element . '<br>';
echo "El array queda así: <br>";
foreach($pila as $element){
    echo $element . '<br>';
}
// push
if($pop_element) array_push($pila, $pop_element);
echo "<br> Se ha añadido este elemento $pop_element <br>";
echo "El array queda así: <br>";
foreach($pila as $element){
    echo $element . '<br>';
}
// shift
$shift_element = array_shift($pila);
echo "<br> Se ha hace shift a este elemento: $shift_element <br>"; // 12345678A
echo "El array queda así: <br>";
foreach($pila as $element){
    echo $element . '<br>';
}

?>

<!-- 
    Ejercicio 6:
    Indica lo que devuelve array_slice() a partir del array $entrada:
-->
<?php
$entrada = array('a','b','c','d','e');
echo "<h1>Ejercicio 7: </h1> <br/>";
echo "a) ( "; // Se incluye el elemento con ese argumento porque SOLO HAY UNO
foreach(array_slice($entrada, 2) as $element){ 
    echo $element. ' ';
}
echo ') <br>';
echo "b) ( ";
foreach(array_slice($entrada, -2,1) as $element){
    echo $element. ' ';
}
echo ') <br>';
echo "c) ( "; // El 2do argumento NO INCLUYE el valor con ese indice
foreach(array_slice($entrada, 0,3) as $element){
    echo $element. ' ';
}
echo ') <br>';
?>