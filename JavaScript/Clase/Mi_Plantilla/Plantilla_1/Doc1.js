
let productos2 = 
`G27CQ4 212,65€
XG27ACS 269,66€
CQ32G2SE 214,20€
G27C4X 189,45€`;
// 1. Separar cada monitor y su precio
let productosArray2 = productos2.split(" "); // Separar por espacio
console.log(productosArray2);
let resultado2 = [];


// 2. Recorrer el array y extraer nombre y precio
for(let i = 0; i <productosArray2.length; i += 2){ //+= 2 porqe se almacenan en precio y producto
    //Extraemos nombre y el precio
    let nombre2 = productosArray2[i];
    let precioCad = productosArray2[i+1].replace(",", ".");

    //Pasamos precio a numero float
    let precio2 = parseFloat(precioCad);

    //Alamacenamos en un nuevo array
    resultado2.push({ nombre: nombre2 , precio: precio2 });
}

// 3. Mostrar los resultados
console.log(resultado2);