// GUARDAR ARCHIVO
async function leerArchivo(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = (e) => resolve(e.target.result);
        reader.onerror = (e) => reject(e);
        reader.readAsText(file);
    });
}

function mostrarContenido(contenido) {
    var elemento = document.getElementById('contenido-archivo');
    elemento.innerHTML = contenido;
}

document.getElementById('file-input').addEventListener('change', async (e) => {
    const archivo = e.target.files[0];
    if (!archivo) {
        return;
    }
    const contenido = await leerArchivo(archivo);
    console.log(contenido);
    mostrarContenido(contenido);


    // ELIMINAR DUPLICADOS

    // Separamos por lineas y retorno de carro
    const lineas = contenido.split("\r\n");
    // Creamos conjunto
    perros = new Set(lineas);
    perros.delete("");

    // PASAR DE CONJUNTO A ARRAY
    arrayPerros = [...perros];
    console.log("PERROS")
    console.log(arrayPerros);

    // INTRODUCIR NOMBRE

    nombre = prompt("Introduce nombre perro");


// PADRES
function padres(array, ...args){
    padre = null;
    madre = null;

    array.forEach(linea => {
        dato = linea.split(";")
    
    for(let i=2; i <= dato.length; i++){
        if(nombre === dato[i]){
            padre = dato[0];
            madre = dato[1];
        }
    }
   
});

return (madre ?? "desconocido") + " " + (padre ?? "desconocido");

}
console.log("Padres: " + padres(arrayPerros, nombre));

// ABUELOS
function abuelos(array, subyascente){
    abuelo = null;
    abuela = null;

    arrayPerros.forEach(linea => {
        const dato = linea.split(";")

        for(let i=2; i <= dato.length; i++){
            if(subyascente === dato[i]){
                abuelo = dato[0];
                abuela = dato[1];
            }
        }
    });

    return (abuelo ?? "desconocido")  + " " + (abuela ?? "desconocido");
}
console.log("Abuelos maternos: " + abuelos(arrayPerros, madre));
console.log("Abuelos paternos: " + abuelos(arrayPerros, padre));

// HIJOS
function hijos(arrayPerros){
    // HIJOS
    const hijos = [];
    // Tyson;Lila;Tux;Kiwi;Moka;Pochita;Bonzo

    arrayPerros.forEach(linea => {
        const dato = linea.split(";")

        if (linea.includes(nombre)) {

            // console.log(linea);
            // console.log(dato.indexOf(nombre));

            if (dato.indexOf(nombre) < 2) {
                for (let i = 2; i < dato.length; i++) {
                    hijos.push(dato[i]);
                }
            }
        }
    });

    return hijos;
}

console.log(hijos(arrayPerros));















}, false);