<style>
    .resultado {
        font-size: 1.2em;
        color: blue;
        margin-top: 20px;
    }
</style>

<?php

if(isset($_POST["button"])){

    $numero1 = (float) $_POST["num1"];
    $numero2 = (float) $_POST["num2"];
    $operacion = $_POST["operacion"];
    
    calcular($operacion); 
}
    
function calcular(){

    global $numero1, $numero2, $operacion;
    $resultado = null;
    
    if(strcasecmp("Suma", $operacion)== 0){
        
        $resultado = $numero1 + $numero2;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }else if(strcasecmp("Resta", $operacion)== 0){

        $resultado = $numero1 - $numero2;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";                

    }else if(strcasecmp("Multiplicación", $operacion)== 0){

        $resultado = $numero1 * $numero2;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }else if(strcasecmp("División", $operacion)== 0){
        
        $resultado = $numero1 / $numero2;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }else if(strcasecmp("Módulo", $operacion)== 0){
        
        $resultado = $numero1 % $numero2;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }else if(strcasecmp("Incremento", $operacion)== 0){

        $numero1++;
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }else if(strcasecmp("Decremento", $operacion)== 0){

        $numero1--;
        
        echo "<p class = 'resultado'>El resultado es: $resultado</p>";

    }

}


?>