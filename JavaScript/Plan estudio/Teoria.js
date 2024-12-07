/*------------------------------------------------------------------------DIA 1--------------------------------------------------------------------*/

// let x = 5;       // x es un número
// x = "Hola";      // Ahora x es un string

var z = 5;
var z = 10; // Permitido

// let f = 5;
// let f = 10; // Error

// const x = 5;
// x = 10; // Error

"5" == 5; // true

"5" === 5; // false




/*------------------------------------------------------------------------DIA 2--------------------------------------------------------------------*/


/*-----------------STRINGS-------------------*/

let texto = "Hola mundo";

console.log(texto.toLowerCase());
console.log(texto.toUpperCase());
console.log(texto.indexOf("Hola"));
console.log(texto.split(" ")); //Sepera por espacion en balcnpo
console.log(texto.trim(" ")); //Elimina espacios en balncoi
console.log(texto.slice(0,4));

let texto1 = "JavaScript es genial";
let resultado = texto.split("").reverse().join("").slice(0, 10);
console.log(resultado);
/*-----------------ARRAYS-------------------*/

let numero = [2,3,4];

numero.unshift(1); //[1,2,3,4] Agrega el principio
numero.push(5); // [1,2,3,4,5] Agrega al final
numero.shift(); //[2,3,4,5] Elimina el primer elemento
numero.pop(); //[2,3,4] Elimina el ultimo elemento

//No modififca el array [2,3,4]

// Aplica una función a cada elemento y devuelve un nuevo array
numero.map(num => num * 2); //[4,6,8]
// Filtra elementos según una condición
numero.filter(num => num  % 2 === 0); //[2,4] todos son pares
//Crea un array desde el indice 1
let num2 = numero.slice(1) 
console.log(num2);
//[2,3,4] 9
let suma = numero.reduce((acumulador, valor) => acumulador + valor, 0); 
console.log(suma);
// Orden descendente
let ordenadosPorEdad = mayoresDe30.sort((a, b) => b.edad - a.edad);

/*-----------------FECHAS-------------------*/

let ahora = new Date(); //Objeto fecha

console.log(Date.now());
console.log(ahora.getFullYear());
console.log(ahora.getMonth());
console.log(ahora.getDate());

// 1-b 2-a 3-a 4-a 5-a 6-a 7-b 8- 9- 10c


let fecha = new Date("2024-01-01T00:00:00");
fecha.setDate(fecha.getDate()+30);

// fecha.setDate(fecha.getDate() + 30);
console.log(fecha.toISOString().slice(0, 10));

/*------------------------------------------------------------------------DIA 3--------------------------------------------------------------------*/

/*----------------1. Manejo de Arrays y Conjuntos-------------------------*/
/*-----------------Arrays-------------------*/
/*Un array es una colección ordenada de elementos que pueden ser de cualquier tipo (números, cadenas, objetos, etc.).*/ 

let numeros = [1, 2, 3, 4];
let frutas = ["manzana", "pera", "uva"];

let arr1 = [1, 2];
let arr2 = [3, 4];
let unido = [...arr1, ...arr2];
console.log(unido); // [1, 2, 3, 4]


/*-----------------Conjuntos-------------------*/
/*Un set es una colección de valores únicos, es decir, no permite duplicados.*/ 

// CREAR UN COJUNTO
let conjunto = new Set([1, 2, 3]);
console.log(conjunto); // Set(3) { 1, 2, 3 }

// UNIR 2 CONJUNTOS
let conjunto1 = new Set([1, 2]);
let conjunto2 = new Set([2, 3]);
let union = new Set([...conjunto1, ...conjunto2]);
console.log(union); // Set(3) { 1, 2, 3 }

// Intersección de conjuntos
let interseccion = new Set([...conjunto1].filter(x => conjunto2.has(x)));
console.log(interseccion); // Set(1) { 2 }



 // ELIMINAR DUPLICADOS

    // Separamos por lineas y retorno de carro
    const lineas = contenido.split("\r\n");
    // Creamos conjunto
    const perros = new Set(lineas);
    perros.delete("");

    // PASAR DE CONJUNTO A ARRAY
    const arrayPerros = [...perros];


/*----------------2. Funciones: Definición, Parámetros y Valor de Retorno-------------------------*/

/*-----------------2.1 Definición de funciones-------------------*/
// Declaración de una función
function sumar(a, b) {
    return a + b; // Devuelve el resultado de la suma
}
console.log(sumar(2, 3)); // 5

// Expresión de función
const multiplicar = function(a, b) {
    return a * b;
};
console.log(multiplicar(2, 3)); // 6

// Función flecha
const dividir = (a, b) => a / b;
console.log(dividir(6, 2)); // 3


/*-----------------2.2 Parámetros de funciones-------------------*/
// Parámetros opcionales
function saludar(nombre = "Invitado") {
    return `Hola, ${nombre}!`;
}
console.log(saludar()); // "Hola, Invitado!"
console.log(saludar("Khaled")); // "Hola, Khaled!"

// Rest parameters (...)
function sumarTodos(...numeros) {
    return numeros.reduce((acc, num) => acc + num, 0);
}
console.log(sumarTodos(1, 2, 3, 4)); // 10

/*-----------------2.3 Valor de retorno (Resultado de una funcion)-------------------*/
// Con return
function cuadrado(x) {
    return x * x;
}
console.log(cuadrado(4)); // 16

// Sin return (valor undefined)
function imprimirMensaje(mensaje) {
    console.log(mensaje);
}
console.log(imprimirMensaje("Hola")); // "Hola" y luego `undefined`

/*----------------3. Bucles y Control de Flujo-------------------------*/

/*-----------------3.1 Tipos de bucles-------------------*/

// FOR
for (let i = 0; i < 5; i++) {
    console.log(i);
}

// WHILE
let i = 0;
while (i < 5) {
    console.log(i);
    i++;
}

// DO-WHILE
let i1 = 0;
do {
    console.log(i);
    i++;
} while (i < 5);

// FOR-OF
let numeros2 = [1, 2, 3];
for (let num of numeros) {
    console.log(num);
}

// FOR-IN
let objeto = { a: 1, b: 2, c: 3 };
for (let clave in objeto) {
    console.log(clave, objeto[clave]);
}


/*-----------------3.2 Control de flujo-------------------*/Ç

// BREAK
for (let i = 0; i < 5; i++) {
    if (i === 3) break;
    console.log(i); // 0, 1, 2
}

// CONTINUE
for (let i = 0; i < 5; i++) {
    if (i === 3) continue;
    console.log(i); // 0, 1, 2, 4
}

/*
Arrays: Métodos como map, filter, y spread son fundamentales para la manipulación de datos.
Sets: Útiles para trabajar con valores únicos y realizar operaciones como unión e intersección.
Funciones: Pueden ser tradicionales, flecha o anónimas. Entender parámetros y retornos es clave.
Bucles y control de flujo: Permiten manejar la lógica de repetición y controlar el flujo del programa.
*/

/*------------------------------------------------------------------------DIA 4--------------------------------------------------------------------*/