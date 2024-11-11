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
    const lineas = contenido.split('\r\n');

    jugadores = new Set([]);

    lineas.forEach(linea => {
        jugadores.add(linea);
    });

    console.log(jugadores);

    // PASAR DE CONJUNTO A ARRAY
    const participantes = Array.from(jugadores);
    console.log(participantes);

    // INSERTAR JUGADORES MASCULINO Y FEMENINOS

    const masculino = [];
    const femenino = [];

    for(let i= 0; i< participantes.length;i++){

        const jugador = participantes[i];
        const dato = jugador.split(';');
        const genero = dato[1];

        console.log( "Dato: " +genero);
        
        if (genero === 'M') {
            masculino.push(jugador);
        } else if (genero === 'F') {
            femenino.push(jugador);
        }
    }

    const masculinos = masculino.join('\n');
    const femeninos = femenino.join('\n');
    console.log("Jugadores masculinos: " + masculinos);
    console.log("Jugadores femeninos: " + femeninos);


    // DIVIDR UN ARRAY POR CAMPOS

      
    const jugadorMasc = masculinos.split("\n").map

    








}, false);