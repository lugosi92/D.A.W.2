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

    // LISTADO JUGADORES MASCULINO Y FEMENINOS

    const masculino = [];
    const femenino = [];

    for(let i= 0; i< participantes.length;i++){//imperativa

        const jugador = participantes[i];
        const dato = jugador.split(';');
        const genero = dato[1];
        
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
// cambiar desde aqui a declaraitva(arriba)

    // DIVIDR UN ARRAY POR DATOS


    const jugadorMasc = masculinos.split("\n").map(linea =>{
        const[nombre, sexo, apellido, posicion, grupo] = linea.split(";");
        return { nombre, sexo, apellido, posicion, grupo };
    });

    console.log(jugadorMasc);
    
    const jugadorFem = femeninos.split("\n").map(linea =>{
        const[nombre, sexo, apellido, posicion, grupo] = linea.split(";");
        return { nombre, sexo, apellido, posicion, grupo };
    });
    
    console.log(jugadorFem);

    // CLASIFICAMOS JUGADORES POR POSICIONES

    const porteros = jugadorMasc.filter(j => j.posicion === 'Portero');
    const defensas =jugadorMasc.filter(j => j.posicion === 'Defensa');
    const centros = jugadorMasc.filter(j => j.posicion === 'Centro');
    const delanteros = jugadorMasc.filter(j => j.posicion === 'Delantero');

    console.log(porteros);
    console.log(defensas);
    console.log(centros);
    console.log(delanteros);

    // EQUIPOS Y RESERVAS

    const equipos = [];
    const reservas = [];

    // CREA que exita 1 portero, 4 defensas ... que siga creando equipos
    while(porteros.length >= 1 && defensas.length >= 4 &&
          centros.length >= 3 && delanteros.length >= 3){

            const equipo = {
                Portero: porteros.splice(0,1),
                Defensa: defensas.splice(0,4),
                Centro: centros.splice(0,3),
                Delantero: centros.splice(0,3),
            }
        equipos.push(equipo);
        }
    reservas.push(...porteros,...defensas,...centros,...delanteros);

        console.log("Equipos: " +equipos);
        console.log("Reservas: " +reservas);
}, false);