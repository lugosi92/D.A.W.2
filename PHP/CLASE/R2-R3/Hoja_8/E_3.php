<?php

function esBisiesto($anio){
    if(($anio % 4 ==0 && $anio % 100 !=0)|| ($anio % 400 == 0)){
        return true;
    }else{
        return false;
    }

}

$anio1= 2023;
$anio2 = 2022;

if (esBisiesto($anio1)){
    echo "Es bisiesto 2023";
}else{
    echo "No es bisiesto 2023";
}

echo "<br>";

if (esBisiesto($anio2)){
    echo "Es bisiesto 2022";
}else{
    echo "No es bisiesto 2022";
}