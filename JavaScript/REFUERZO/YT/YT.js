// OPERACIONES
console.log("EJERCICIO 1")
function operaciones (a, b, operacion){

let res = 0;

    if(operacion === "suma"){
        res = a + b;
    }else if(operacion === "resta"){
        res = a + b;
    }else if(operacion === "multiplicacion"){
        res = a * b;
    }else if(operacion === "division"){
        res = a / b;
    }

    return res;
}

// ALMACENAR PARES EN UN ARRAY
console.log(operaciones(2,5, "multiplicacion"));

console.log("EJERCICIO 2");

function almacenPar(a, b){
    let array = [];

    for(let i = a; i<=b; i++){
        if(i % 2 == 0){
            array.push(i);
        }
    }
    return array;
}

console.log(almacenPar(1,10));


// TABLAS
console.log("EJERCICIO 3");

function tabla(num, hasta){
    for(let i=0; i<=hasta; i++){
        resultado = num * i;
       if(i !== 5) console.log(`${num} X ${i} = ${resultado}`);
    }
    }

    tabla(8, 10);


// Multiplos de 4

function filtrar(){

    let array = [];
    let num = [];

    for(let i = 1; i<=100; i++){
        array.push(i);
    }

    array.filter((elemento)=> {
        if(elemento % 3 ===0)
            num.push(elemento)
    });
    console.log(num);
}

filtrar();