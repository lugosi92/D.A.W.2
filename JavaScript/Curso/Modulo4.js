//Funcion
function saludar() {
    console.log("Hola, bienvenido a JavaScript!");
}

saludar(); // Llama a la función y mostrará: Hola, bienvenido a JavaScript!


//Funcion con parametros
function saludar(nombre){
    console.log("Hola " + nombre + " bienvenido a la pagina web");
}

saludar("Khaled");

//Funcion con parametros y retornos
function mult(a, b){
    return a * b;
}

let resultado = mult(9,5);
console.log(resultado);

//Arrow
const multiplicar = (a, b) => a * b; //Con parametros
console.log(multiplicar(6, 7)); // Salida: 42

const saludar = () => console.log("Hola, mundo!"); //Sin parametros