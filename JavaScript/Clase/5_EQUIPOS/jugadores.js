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

const femenino = [];
const masculino = [];

arrayJugadores.forEach(linea => {
    const dato = linea.split(";");
    dato[1] === 'M' ?  masculino.push(linea) : "";
    dato[1] === 'F' ?  femenino.push(linea) : "";
});

// JUGADORES MACULINOS
console.log("JUGADORES MASCULINOS");
console.log(masculino);
// JUGADORES FEMENINOS
console.log("JUGADORES FEMENINOS");
console.log(femenino);

//LISTADO DE POSICIONES MASCULINO
    const porteros = [];
    const defensas = [];
    const delanteros = [];
    const centros = [];

    masculino.forEach(linea => {
        const dato = linea.split(";");
        dato[3] === 'Portero' ?  porteros.push(linea) : "";
        dato[3] === 'Defensa' ?  defensas.push(linea) : "";
        dato[3] === 'Delantero' ?  delanteros.push(linea) : "";
        dato[3] === 'Centro' ?  centros.push(linea) : "";
    });
    // PORTEROS
    console.log("PORTEROS");
    console.log(porteros);

    // DEFENSAS
    console.log("DEFENSAS");
    console.log(defensas);

    // DELANTEROS
    console.log("DELANTERO");
    console.log(delanteros);

    // CENTROS
    console.log("CENTROS");
    console.log(centros);


    // METER JUGADORES Y QUITAR 
    const equipos = [];
    const reservas = [];

    while( porteros.length >= 1 && defensas.length >= 4 
        && delanteros.length >= 3 && centros.length >= 3){

        const equipo = [];

        equipo.push(porteros.pop());

        for(i=1; i<=4 ; i++){
            equipo.push(defensas.pop());
        }

        for(i=1; i<=3; i++){
            equipo.push(centros.pop());
            equipo.push(delanteros.pop());
        }
        equipos.push(equipo);
    }

    // EQUIPOS
    console.log("EQUIPOS")
    console.log(equipos);

    // RESERVAS
    while( porteros.length >= 1 || defensas.length >= 1 
        || delanteros.length >= 1 || centros.length >= 1){
            
            reservas.push(porteros.pop());
            reservas.push(defensas.pop());
            reservas.push(delanteros.pop());
            reservas.push(centros.pop());

    }

    // RESERVAS
    console.log(reservas);
 
}, false);