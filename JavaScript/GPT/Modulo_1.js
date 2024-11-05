// EJERCICIO 1
const Ej1 = "       1.-Introduccion"
console.log(Ej1);

    console.log("           Hola, JavaScript!")


// Apartado 2
const Ej2 = "       2.-Sintaxis Basico y Tipos de Datos"
console.log(Ej2);

    // Ejercicio 1
    let nombre = "Juan";
    let edad = 21;

    console.log(nombre,edad);

    // Ejercicio 2
    console.log("           Ejercicio 2");
    let x = 10;
    let y = 15;

    
    let suma = x + y; 
    let resta = x - y;
    let multiplicacion = x * y;
    let division = x / y;
    console.log (suma, resta, multiplicacion, division);

    if ( x > 5 && y < 20){
        console.log("correcto");
    }

    // Ejercicio 3 
    console.log("           Ejercicio 3");
    let precio = "49.99";
    console.log("Precio " + precio);
    
    precio = parseFloat(precio);
    console.log("Tipos de dato: " + typeof precio);

    precio = precio.toString();
    console.log("Tipos de dato: " + typeof precio);

 
// Apartado 3
const Ej3 = "       3.-Control de Flujo"
console.log(Ej3);

    //Ejercicio 1
    console.log("           Ejercicio 1");

    let nota = Math.floor(Math.random() * 101);

    if(nota >= 90){
        console.log("Excelencia");
    }else if(nota <=80 && nota >=50){
        console.log("Aprobado");
    }else{
        console.log("Suspendido");
    }
    

    //Ejercicio 2
    console.log("           Ejercicio 2");

     let diaSemana = "martes";

     switch (diaSemana){
        case "lunes":
            console.log("Comienzo de la semana");
            break;
        case "martes":
            console.log("Laboral 1");
            break;
        case "miercoles":
            console.log("Laboral 2");
            break;
        case "jueves":
            console.log("Laboral 3");
            break;
        case "viernes":
            console.log("Comienzo de fin de semana");
            break;
        case "sabado":
            console.log("Finde semana 1");
            break;
        case "domingo":
            console.log("Finde semana 2");
            break;
    }


    //Ejercicio 3
    console.log("           Ejercicio 3");

    console.log("Numeros del 1 al 10 con for: ")
    for(let i = 0; i <= 10; i++){
        console.log(i);
    }

    let j = 0
    console.log("Numeros del 1 al 10 con for: ")

    while(j <= 9){
        j++;
        console.log(j);
    }

// Apartado 4
const Ej4 = "       4.-Funciones"
console.log(Ej4);

    //Ejercicio 1
    console.log("           Ejercicio 1");

    function saludar(nombre){
        console.log("Hola " + nombre);
    }

    saludar("Khaled");
    saludar("Pablo");
    saludar("Hassbulla");

    //Ejercicio 2
    console.log("           Ejercicio 2");

    function sumas(x,y){
        let resultado = x + y;
        console.log("El resultado es: " +resultado);
    }

    sumas(3,6);

    //Ejercicio 3
    console.log("           Ejercicio 3");

    // Hosting
    function Hosting(){
        var g = 2;
        console.log(g);
    }

    Hosting();

    // Scope
    function scope(){
        var f = 8;
    }
    scope();
    console.log(f);