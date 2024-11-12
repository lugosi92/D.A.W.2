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

    const lineas = contenido.split("\r\n");

    jugadores = new Set(lineas);
    jugadores.delete("");

// PASAR DE CONJUNTO A ARRAY
    arrayJugadores = [...jugadores];
    console.log("ARRAY JUGADORES")
    console.log(arrayJugadores);

// LISTADO MASCULINO Y FEMENINO

arrayJugadores.forEach(linea => {
    const dato = linea.split(";");
    if(dato[1] === 'M'){
        
    }
    
});
}, false);