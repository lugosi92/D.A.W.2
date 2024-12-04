/*----------------------------------------METODOS--------------------------------------------*/

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
numero.map(num => num * 2); //[4,6,8]
numero.filter(num => num  % 2 === 0); //[2,4] todos son pares

let num2 = numero.slice(1) //Crea un array desde el indice 1
console.log(num2);
let suma = numero.reduce((acumulador, valor) => acumulador + valor, 0); //[2,3,4] 9
console.log(suma);


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

/*----------------------------------------EJERCICIOS--------------------------------------------*/

/*-----------------EJERCICO 1-------------------*/

let text = " JavaScript es genial ";



/*-----------------EJERCICO 2-------------------*/
