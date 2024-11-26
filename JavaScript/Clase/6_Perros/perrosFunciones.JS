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
    console.log("ARRAY perros")
    console.log(arrayPerros);

    // INTRODUCIR NOMBRE

    // nombre = prompt("Introduce nombre perro");

    nombre = "Lila";




function familia(array, nombre){
    familiarF = null;
    familiarM = null;

    array.forEach(linea => {
        dato = linea.split(";")
    

    if (nombre == dato[2] || nombre == dato[3] || nombre == dato[4]
        || nombre == dato[5] || nombre == dato[6]) {
        familiarF = dato[1];
        familiarM = dato[0];
    }
});

    console.log("Padre: " + familiarM +  " Madre: " + familiarF)
}

familia(arrayPerros, "Bonzo");



familia(arrayPerros);
    // HIJOS
    const hijos = [];
    // Tyson;Lila;Tux;Kiwi;Moka;Pochita;Bonzo

    arrayPerros.forEach(linea => {
        const dato = linea.split(";")

        if (linea.includes(nombre)) {

            console.log(linea);
            console.log(dato.indexOf(nombre));

            if (dato.indexOf(nombre) < 2) {
                for (let i = 2; i < dato.length; i++) {
                    hijos.push(dato[i]);
                }
            }
        }
    });


     //HIJOS;
     console.log("HIJOS");
     console.log(hijos);













}, false);