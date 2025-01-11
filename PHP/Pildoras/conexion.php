<?php
/*------------------------------------VIDEO 378 Conexion BD---------------------------------------------------*/
/*
1. 4 variables
    Direccion del servidor
    Nombre de la base de datos
    Usuario
    Contraseña
2. Conexion 2 formas con Poo o procediminetos


// 1 VARIABLES
$db_host = "localhosty";
$db_usuario = "admin1";
$db_contra= "";
$db_nombre = "curso_php";


// 2. CONEXION

// Procedimientos

$conexion= mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

// 3. MANEJO DE ERRORES EN LA CONEXIÓN
if (!$conexion) {
    die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
}


// 2. CONSULTA PRUEBA

$consulta = "SELECT * FROM datosusuario";

    // 2.1 Ejecutar consulta

    $resultados = mysqli_query($conexion, $consulta);

    // 3. MANEJO DE ERRORES EN LA CONEXIÓN
    if (!$resultados ) {
        die("Fallo al realizar la consulta: " . mysqli_error());
    }
    // 2.2 Tabla virtual devuelve la infromacion de la consutla
    while ($fila = mysqli_fetch_row($resultados)) {
        echo "ID: " . $fila[0] . " - Nombre: " . $fila[1] .  " -Apellido: " . $fila[2] ."<br>";
    }
/*------------------------------------VIDEO 37 Conexion BD---------------------------------------------------*/
/*
1. Manejo de errores
2. Manejo de erroes con excepciones
*/


// HABILITAR EXCEPCIONES EN MYSQLI
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    // Conexion
    $conexion= mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    echo "Conexion exitosa";

    // Consulta 
    $consulta = "SELECT * FROM datosusuario";
    $resultados = mysqli_query($conexion, $consulta);

    // Imprimir consulta
    while ($fila = mysqli_fetch_row($resultados)) {
        echo "ID: " . $fila[0] . " - Nombre: " . $fila[1] .  " -Apellido: " . $fila[2] ."<br>";
    }

} catch (mysqli_sql_exception $e){

    echo "Error al conectar con la base de datos: " . $e->getMessage();
// Opcional
}finally {
    // Cerrar conexión
    if (isset($conexion) && $conexion) {
        mysqli_close($conexion);
    }
}


?>