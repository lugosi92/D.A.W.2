<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

/*------------------------------------VIDEO 22---------------------------------------------------*/
/*
    1. Conceptos
    2. Creacion clases 
    3. Conceptos y creacion de instancias
*/

// Los objetos tienen cosas en comun y con las instancias se crean objetos distintos con las mismas coincidencias

/*------------------------------------VIDEO 23---------------------------------------------------*/

/*
    1. Propiedades y metodos
    2. Cambio de propiedades
    3. Llamadas a metodos
*/

// Clase
class Coche{

  /*  private $rueda;
    private $color;
    private $motor;

    // CONSTRUCTOR
    public function __construct(){
        $this->ruedas= 4;
        $this->color= "";
        $this->motor= 1600;

    }*/

// CONSTRUCTOR - ATRIBUTOS
    public function __construct(
        private int $rueda,
        private String $color,
        private int $motor
    ){}


    // METODOS
    function arrancar(){
        echo "Arrancando motores";
    }

    function girar(){
        echo "Estoy girando";
    }

    function frenar(){
        echo "Estoy frenando ";
    }

    function establecer_color($color_coche){
        $this->color = $color_coche;
        echo "Color coche " .  $this->color;
    }

}

// Instancias
$renault = new Coche(4, "Rojo", 1600);
$mercedes = new Coche(4, "Negro", 1800);

// Usando un método de la clase
$mercedes->girar();
$mercedes->establecer_color("LILA");

/*------------------------------------VIDEO 24 Otras clases parecidas---------------------------------------------------*/

class Camion{
  // CONSTRUCTOR - ATRIBUTOS
      public function __construct(
          private int $rueda,
          private String $color,
          private int $motor
      ){}
  
  
      // METODOS
      function arrancar(){
          echo "Arrancando motores";
      }
  
      function girar(){
          echo "Estoy girando";
      }
  
      function frenar(){
          echo "Estoy frenando ";
      }
  
      function establecer_color($color_camion){
          $this->color = $color_coche;
          echo "Color coche " .  $this->color;
      }
  
  }


/*------------------------------------VIDEO 25 HERENCIAS---------------------------------------------------*/

class Camion extends Coche{

    public function __construct(
        private int $rueda,
        private String $color,
        private int $motor
    ){}

    function establecer_color($color_camion){
        $this->color = $color_coche;
        echo "Color coche " .  $this->color;
    }

    function arrancar(){
        parent::arrancar();

        echo "Arrancando camion";
    }
}
?>
</body>
</html>