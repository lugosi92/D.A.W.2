/*-----------------Ejercicio 1: Eliminación de duplicados-----------------*/

const numeros = [1, 2, 3, 2, 4, 1, 5];

const conjunto = new Set(numeros);

const arrayNum = [...conjunto];
console.log(arrayNum);

/*-----------------Ejercicio 2: Unión e intersección de conjuntos-----------------*/

const conjuntoA = new Set([1, 2, 3, 4]);
const conjuntoB = new Set([3, 4, 5, 6]);

const union = new Set([...conjuntoA, conjuntoB]);
    console.log(union);
const interseccion = new Set([...conjuntoA].filter(x => conjuntoB.has(x)));
    console.log(interseccion);
const diferencia = new Set([...conjuntoA].filter(x => !conjuntoB.has(x)));
    console.log(diferencia);

/*-----------------Ejercicio 2: Unión e intersección de conjuntos-----------------*/