/*
G27CQ4 212,65€
XG27ACS 269,66€
CQ32G2SE 214,20€
G27C4X 189,45€*/

//Dividiro el lineas
//Cada monitor separa el nombre y precio
//Pasar los numeros String a numeros int

let productos =  "G27CQ4 212,65 XG27ACS 269,66 CQ32G2SE 214,20 G27C4X 189,45";

//1. Dividirlo en lineas

 
console.log(productos);

let arrayProductos = productos.split(",");

console.log(arrayProductos);