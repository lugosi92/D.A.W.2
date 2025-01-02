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
// class Coche{

//   /*  private $rueda;
//     private $color;
//     private $motor;

//     // CONSTRUCTOR
//     public function __construct(){
//         $this->ruedas= 4;
//         $this->color= "";
//         $this->motor= 1600;

//     }*/

// // CONSTRUCTOR - ATRIBUTOS
//     public function __construct(
//         private int $rueda,
//         private String $color,
//         private int $motor
//     ){}


//     // METODOS
//     function arrancar(){
//         echo "Arrancando motores";
//     }

//     function girar(){
//         echo "Estoy girando";
//     }

//     function frenar(){
//         echo "Estoy frenando ";
//     }

//     function establecer_color($color_coche){
//         $this->color = $color_coche;
//         echo "Color coche " .  $this->color;
//     }

// }


/*------------------------------------VIDEO 24 Otras clases parecidas---------------------------------------------------*/

// class Camion{
//   // CONSTRUCTOR - ATRIBUTOS
//        public function __construct(
//           private int $rueda,
//           private String $color,
//           private int $motor
//       ){}
  
  
//       // METODOS
//       function arrancar(){
//           echo "Arrancando motores";
//       }
  
//       function girar(){
//           echo "Estoy girando";
//       }
  
//       function frenar(){
//           echo "Estoy frenando ";
//       }
  
//       function establecer_color($color_camion){
//           $this->color = $color_coche;
//           echo "Color coche " .  $this->color;
//       }
  
//   }


/*------------------------------------VIDEO 25 HERENCIAS---------------------------------------------------*/
/*------------------------------------VIDEO 26 MODIFICADORES DE ACCESO---------------------------------------------------*/

    // Encapsular --> Solo es accesible desde la propia clase

    /*
        1. Public: cualquier parte
        2. Private: la propia clase
        3. Protected: clases heredadas 
    */

 class Coche{
    // Constructor con propiedades privadas
    public function __construct(
        protected int $rueda,
        protected string $color,
        protected int $motor
    ) {}

    // Métodos getter
    function get_rueda(){
        return $this->rueda; // Usar $this-> para acceder a las propiedades
    }

    function get_color(){
        return $this->color;
    }

    function get_motor(){
        return $this->motor;
    }

    // Métodos de acción
    function arrancar(){
        echo "Arrancando motores" . "<br>";
    }

    function girar(){
        echo "Estoy girando" . "<br>";
    }

    function frenar(){
        echo "Estoy frenando " . "<br>";
    }

    // Método para establecer el color
    function establecer_color($color_coche){
        $this->color = $color_coche;
        echo "Color del coche cambiado a: " . $this->color . "<br>";
    }
}
class Camion extends Coche{

    public function __construct(
        protected int $rueda,
        protected String $color,
        protected int $motor
    ){}

    function establecer_color($color_camion){
        $this->color = $color_coche;
        echo "Color coche " .  $this->color;
    }

    function arrancar(){
        parent::arrancar();

        echo "Arrancando camion". "<br>";
    }
}


// Crear una instancia de la clase
$renault = new Coche(4, "Rojo", 1600);
$iveco = new Camion(7, "Blanco", 4000);

// Cambiar el color del coche
// $renault->establecer_color("Lila");

// Mostrar el color actual del coche
echo "Color actual del coche: " . $renault->get_color() . "<br>";
echo "Color actual del camion: " . $iveco->get_color() . "<br>";

// Llamar a otros métodos
$renault->arrancar();
$renault->girar();





/*------------------------------------VIDEO 26 VARIABLES Y METODOS DE ACCESO---------------------------------------------------*/


/*
    Cada objeto almacena una infromacion diferente en cada metodo, 
    Si usamos static almacenan lo mismo ya que pertene a la clae no al objeto,
    por ejemplo si existiera una ayuda para comprar el coche es la misma simepre
*/
include("Concesionario.php");

// Compra realizada por Antonio
$compra_Antonio = new Compra_vehiculo("compacto");
$compra_Antonio->climatizador();
$compra_Antonio->tapiceria_cuero("blanco");
echo $compra_Antonio->precio_final() . "<br>";

// Compra realizada por Ana
$compra_Ana = new Compra_vehiculo("compacto");
$compra_Ana->climatizador();
$compra_Ana->tapiceria_cuero("rojo");
echo $compra_Ana->precio_final();
?>

</body>
</html>