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


   /*----------------------------------PASO 1 - ELIMINAR DUPLICADOS Y CREAR LISTADO-----------------------------*/
    // Separamos por lineas y retorno de carro
    const lineas = contenido.split("\r\n");
    // Creamos conjunto
    jugadores = new Set(lineas);
    jugadores.delete("");
    // PASAR DE CONJUNTO A ARRAY
    arrayJugadores = [...jugadores];

 /*----------------------------------PASO 2 - SEPARAR POR CATEGORIAS-------------------------------------------*/

const juveniles = [];
const adultos = [];


arrayJugadores.forEach(lineas => {
    dato = lineas.split(";");

    
});

console.table(lineas);










    
}, false);