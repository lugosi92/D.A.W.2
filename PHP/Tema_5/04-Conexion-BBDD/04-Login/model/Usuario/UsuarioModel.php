<?php
// crear la lista
function login($usuarios, $usuario_cliente)
{
    $cont = 0;
    $encontrado = false;
    while ($cont < count($usuarios) && !$encontrado) {
        if (
            $usuario_cliente['usuario'] === $usuarios[$cont]['usuario'] &&
            $usuario_cliente['password'] === $usuarios[$cont]['password']
        )
            $encontrado = true;
        else $cont++;
    }

    return $encontrado;
}

// La diferencia entre PDO y mysqli es que es el PDO es una capa abstracta
// Con PDO puedes usar cualquier base de datos
function selectUsuarios($dbh)
{
    try {
        $array = array();
        $stmt = $dbh->prepare("SELECT * FROM Usuarios");
        // Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos
        $stmt->execute();
        // Mostramos los resultados
        while ($row = $stmt->fetch()) {
            array_push($array, $row);
        }
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br>";
    }

    return $array;
}

// Las sentencias se harían en una clase UsuarioModel, y la conexion sería un atributo de esa clase
// https://chatgpt.com/share/673461a2-8b74-800c-b1af-442a06785404
function getOneUserByCredentials($mysqli, $valor_usuario, $valor_password)
{
    // Consulta SQL directa (sin prepare)
    $query = "SELECT * FROM Usuarios WHERE usuario = '$valor_usuario' AND password = '$valor_password'";

    // Ejecutar la consulta
    $resultado = $mysqli->query($query);

    // Verificar si se obtiene un registro
    if ($registro = $resultado->fetch_assoc()) // si no es nul
        return $registro; 
    else return null; 
}
