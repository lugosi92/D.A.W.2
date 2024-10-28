/*
G27CQ4 212,65€
XG27ACS 269,66€
CQ32G2SE 214,20€
G27C4X 189,45€*/

//Dividiro el lineas
//Cada monitor separa el nombre y precio
//Pasar los numeros String a numeros int
let productos = "G27CQ4 212,65 XG27ACS 269,66 CQ32G2SE 214,20 G27C4X 189,45";

// 1. Separar cada monitor y su precio
let productosArray = productos.split(" "); // Separar por espacio
let resultado = [];

// 2. Recorrer el array y extraer nombre y precio
for (let i = 0; i < productosArray.length; i += 2) {
    let nombre = productosArray[i]; // Nombre del monitor
    let precioString = productosArray[i + 1].replace(",", "."); // Precio en string, reemplazar coma por punto
    let precio = parseFloat(precioString); // Convertir el precio a número (float)
    
    resultado.push({ nombre: nombre, precio: precio });
}

// 3. Mostrar los resultados
console.log(resultado);
  