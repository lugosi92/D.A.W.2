<?php
// Necesitamos 3 validaciones 
    // 1. Validar informacion en el servidor
    // 2. Validar variable no null
    // 3. Validar que se aun numero

if ($_SERVER["REQUEST_METHOD"] == "POST"){  //1.

        if(isset($_POST["num"])){ //2.
            $num = $_POST['num'];

            $validar = true;

            foreach($num as $valor){ //3.
                if(!is_numeric($valor)){
                    $valor = false;
                    break;
                }
            }

            if($valor = true){
                echo "Numeros introducidos: <br>";
                foreach($num as $valor2){
                    echo $valor2 . "<br>";
                }
                echo "El numero menor es: " . min($num) . "<br>"; 
                echo "El numero mayor es: " . max($num); 
            }
    
    }else{
        echo "Introduce un valor correcto";
    }
}