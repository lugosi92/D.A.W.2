let edad = 18;

if (edad >= 18) {
    console.log("Eres mayor de edad.");
} else {
    console.log("Eres menor de edad.");
}


let dia = 3;

switch (dia) {
    case 1:
        console.log("Lunes");
        break;
    case 2:
        console.log("Martes");
        break;
    case 3:
        console.log("Miércoles");
        break;
    default:
        console.log("Día no válido");
}



for (let i = 0; i < 5; i++) {
    console.log("Iteración número: " + i);
}



let contador = 0;

while (contador < 3) {
    console.log("Contador: " + contador);
    contador++;
}



let numero = 0;

do {
    console.log("Número: " + numero);
    numero++;
} while (numero < 3);
