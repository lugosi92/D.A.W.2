<?php

if(isset($_POST["numero"])){
    $num = $_POST["numero"];

if (is_numeric($num)){
    if ($num % 2 == 0){
        echo "El numero " . $num . " es par";
    }else{
        echo "El numero " . $num . " es impar";
    }
}else{
    echo "Introduce un numero (positivo)";
}
}
?>