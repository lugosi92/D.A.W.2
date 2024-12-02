<?php
function getNameSpanishMonth($name)
{
    switch ($name) {
        case 'January':
            return 'Enero';
        case 'February':
            return 'Febrero';
        case 'March':
            return 'Marzo';
        case 'April':
            return 'Abril';
        case 'May':
            return 'Mayo';
        case 'June':
            return 'Junio';
        case 'July':
            return 'Julio';
        case 'August':
            return 'Agosto';
        case 'September':
            return 'Septiembre';
        case 'October':
            return 'Octubre';
        case 'November':
            return 'Noviembre';
        case 'December':
            return 'Diciembre';
        default:
            return 'Nombre de mes inválido';
    }
}

function getNameSpanishWeek($name)
{
    switch ($name) {
        case 'Monday':
            return 'Lunes';
        case 'Tuesday':
            return 'Martes';
        case 'Wednesday':
            return 'Miércoles';
        case 'Thursday':
            return 'Jueves';
        case 'Friday':
            return 'Viernes';
        case 'Saturday':
            return 'Sábado';
        case 'Sunday':
            return 'Domingo';
        default:
            return 'Nombre de día inválido';
    }
}

function getColorByDay($day)
{
    switch ($day) {
        case 'Monday':
            return '#0000FF'; // Azul
        case 'Tuesday':
            return '#964B00'; // Marrón
        case 'Wednesday':
            return '#FFFF00'; // Amarillo
        case 'Thursday':
            return '#008000'; // Verde
        case 'Friday':
            return '#FF0000'; // Rojo
        case 'Saturday':
            return '#FFC0CB'; // Rosa
        case 'Sunday':
            return '#800080'; // Morado
        default:
            return '#000000'; // Negro por defecto para días inválidos
    }
}

function daysBetweenDates($fechainicio, $fechafin)
{
    return ((strtotime($fechafin) - strtotime($fechainicio)) / 86400);
}

function spanishDateFormater($timestap)
{
    return date("d", $timestap) . " de " . getNameSpanishMonth(date("F", $timestap)) . " de " . date("Y", $timestap);
}

?>

<!-- 
    Ejercicio 1:
    Realiza fechactual.php que muestre la fecha actual de estas formas:
-->

<?php
echo "<h1>Ejercicio 1: </h1> <br/>";
echo date("l") . "<br>";
echo date("l dS") . ' of ' . date("F o H:i:s A") . '<br>'; //Formato: Sunday 03rd of May 2024 08:22:51 PM
echo date("l dS") . ' de ' . date("F") . ' de ' . date("o H:i:s A") . '<br>'; //Formato:Sunday, 03 de May de 2024 08:22:51 PM
echo date("F d, o, H:i A") . '<br>'; //Formato: May 3, 2024, 8:22 pm
echo date("d.m.y") . '<br>'; //Formato: 05.03.24
echo date("n, j, o") . '<br>'; //Formato: 3, 5, 2024
echo date("omd") . '<br>'; //Formato: 20240503
echo 'it is the ' . date("dS") . ' day' . '<br>'; //Formato: 20240503
echo date("D M j H:i:s T o") . '<br>'; //Formato: Sun May 3 20:22:51 CEST 2024
echo date("H:i:s a") . '<br>'; //Formato: 20:05:51 pm
echo date("H:i:s") . '<br>'; //Formato: 20:05:51
?>


<!-- 
    Ejercicio 2:
    Realiza fechas.php en la que se muestre la fecha actual y la fecha dentro de una
    semana en el formato 2024-10-11. Muestra lo mismo pero en el formato:
    "viernes, 11 de octubre de 2024. A las 18:35" (si es posible en español)
-->
<?php
echo "<h1>Ejercicio 2: </h1> <br/>";
$oneWeekLater = date("Y-m-d", strtotime("+1 week"));
echo "La fecha dentro de una semana en el formato $oneWeekLater";


?>

<!-- 
    Ejercicio 3:
    Realiza  checkdate.php  que se compruebe si el año 2023 fue bisiesto y si lo fue el año 2022.
-->

<?php
echo "<h1>Ejercicio 3: </h1> <br/>";
$date1 = mktime(0, 0, 0, 1, 1, 2023);  // Enero 1, 2023
$date2 = mktime(0, 0, 0, 1, 1, 2024);  // Enero 1, 2022

function mostrarSiEsBisiesto($timestamp)
{
    echo "El año " . date("Y", $timestamp) . " es ";
    echo (date("L", $timestamp)) ? "bisiesto" : "no bisiesto";
}


mostrarSiEsBisiesto($date1);
echo '<br>';
mostrarSiEsBisiesto($date2);
?>

<!-- 
    Ejercicio 4:
    Realiza diassemana.php   que escriba “Hoy es Viernes” 
-->
<?php
echo "<h1>Ejercicio 4: </h1> <br/>";
echo "Hoy es " . getNameSpanishWeek(date("l"));
?>
<!-- 
    Ejercicio 5:
    Escribe una página php que muestre diferente bgcolor en función del día de la semana.
-->
<?php
echo "<h1>Ejercicio 5: </h1> <br/>";
echo "<span style=\"background-color:" . getColorByDay(date("l")) . "\">Hoy es " . getNameSpanishWeek(date("l")) . "</span>";
?>

<!-- 
    Ejercicio 6:
    Escribe una página php que guarde en una variable la fecha/hora 12/01/1978 13:45:00. Averiguar qué día de la semana fue (lunes, martes….). 
-->

<?php
$date = mktime(13, 45, 0, 01, 12, 1978);
echo "<h1>Ejercicio 6: </h1> <br/>";
echo date("l", $date);
?>

<!-- 
    Ejercicio 7:
    Imagina que tu sitio web ofrece una oferta durante un tiempo limitado a los usuarios suscritos y quiere recordarles en cada entrada el tiempo que aún les queda
    para disfrutarla. Un ejemplo de lo que mostraría sería esto: 
    Oferta válida del 01 de octubre de 2024 al 01 de noviembre de 2024 Esta oferta es válida durante 1 mes, 
    comenzó el 01/10/2024, finaliza dentro de x días, el 01/11/2024 Realiza dicha página php de modo que el tiempo que queda vaya cambiando. 
-->
<?php
$beginingDate = mktime(0, 0, 0, 10, 01, 2024);
$finalDate = mktime(0, 0, 0, 11, 01, 2024);
$actualDate = date("d/m/Y");

echo "<h1>Ejercicio 7: </h1> <br/>";
echo "Oferta válida del " . spanishDateFormater($beginingDate) . " al " . spanishDateFormater($finalDate) . "<br>";
echo "Esta es válida durante 1 mes, comenzó " . date("d/m/Y", $beginingDate) . ", finaliza dentro de " . daysBetweenDates($actualDate, $finalDate) . " días, el " . date("d/m/Y", $finalDate);

?>