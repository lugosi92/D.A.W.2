<?php
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

foreach($miFecha as $nivel1){
    foreach($nivel1 as $nivel2){
        foreach($nivel2 as $fechas){
            echo "Fechas: " . $fechas. "<br>";
        }
    }
}

echo "<br>";

//B----------------------------------------------------------

$equipo_futbol = array
(
array("Rooney","Chicharito","Gigs"),
array("Suarez"),
array("Torres","Terry","Etoo")
);

foreach($equipo_futbol as $nivel1){
    foreach($nivel1 as $jugador){
        echo "Nivel 1: " . $jugador . "<br>";
    }
}

echo "<br>";
//C----------------------------------------------------------

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

foreach($datos as $nivel1){
    foreach($nivel1 as $nivel2){
        foreach($nivel2 as $dato){
        echo "Dato: " .  $dato . "<br>";
        } 
    }
}

echo "<br>";

//D----------------------------------------------------------

$supermercado = array(
    "Electrodomesticos" => array("Televisor", "Heladera"),
    "Alimentos" => array("Carne", "Leche", "Verduras")
);




//E
$productos = array(
    "procesador" => array(
        "AMD" => "K7 XP 1800",
        "PENTIUM" => "IV 2,5 Ghz"
    ),
    "disco_duro" => array(
        "SEAGATE" => "40GB 10000 rpm",
        "SAMSUNG" => "40GB 7200 rpm",
        "WESTERN_DIGITAL" => "60GB 7200 rpm 8MB caché"
    )
);

// 2 BUCLES | categorias marcas modelos
foreach($productos as $categoria => $marcas){
    foreach($marcas as $marca => $modelos){
        echo "Categoria: " . $categoria . "<br>";
        echo "Marcas: " . $marca . "<br>";
        echo "Modelo: " . $modelos . "<br>";
    }
}
echo "<br>";

//F----------------------------------------------------------
$productos = array(
    "procesador" => array(
        "AMD" => array(
            "K7 XP 1900",
            "K7 XP 1800",
            "K7 XP 1700"
        ),
        "PENTIUM" => array(
            "IV 2,5 Ghz",
            "IV 2,4 Ghz",
            "IV 2,3 Ghz",
            "IV 2,2 Ghz"
        )
    ),
    "disco_duro" => array(
        "SEAGATE" => array(
            "40GB 10000 rpm",
            "80GB 7200 rpm",
            "160GB 7200 rpm"
        ),
        "SAMSUNG" => array(
            "40GB 7200 rpm"
        ),
        "WESTERN_DIGITAL" => array(
            "60GB 7200 rpm 8MB cache",
            "80GB 10000 rpm 16MB cache"
        )
    )
);

//3 niveles | Categorias marcas modelos

foreach($productos as $categorias => $marcas){
    foreach($marcas as $marca => $modelos){
        foreach($modelos as $modelo){
            echo "Categoria: " . $categorias . "<br>";
            echo "Marca: " .  $marca . "<br>";
            echo "Modelo: " . $modelo . "<br>";
        }
    }
}

 