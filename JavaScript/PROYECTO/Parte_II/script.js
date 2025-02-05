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


/*----------------------------------LEER CVS LIBROS-----------------------------*/

//ALMACENAMIENTO DE DATOS



let libros = document.getElementById('importar-input-libros');

libros.addEventListener('change', async (e) => {
    const archivo = e.target.files[0];
    if (!archivo) {
        return;
    }
    const contenidoLibros = await leerArchivo(archivo);
    
    
    const lineas = contenidoLibros.split("\r\n"); 
    arrayLibros = new Set(lineas);  
    arrayLibros.delete("");

    console.log(arrayLibros);
    arrayLibros = [...arrayLibros];
    console.log(arrayLibros);
    

    arrayLibros.forEach(linea => {
        let dato = linea.split(",");
        let lector = new Lectores(dato[0],dato[1],dato[2], 
                                  dato[3],dato[4], false , null );
        arrayLibros.push(lector);
     });
    
     console.log(arrayLibros);
});

// /*----------------------------------LEER CVS LECTORES-----------------------------*/
// //ALMACENAMIENTO DE DATOS

// const contenidoLectores = "";

// let lectores = document.getElementById('importar-input-lectores');

// lectores.addEventListener('change', async (e) => {
//     const archivo = e.target.files[0];
//     if (!archivo) {
//         return;
//     }
//     contenidoLectores = await leerArchivo(archivo);
//     console.log(contenidoLectores);

// });

//----------------------------------CONSTRUCTORES------------------------------
//LECTORES
function Lectores(numSocio, nombre, apellido, telefono, email, bajaLector, Lector){
    this.numSocio = numSocio;
    this.nombre = nombre;
    this.apellido = apellido;
    this.telefono = telefono;
    this.email = email;
    this.bajaLector = bajaLector;
    this.Lector = Lector;
}
//LIBROS
function Libros(codLibro, isbn, autor, titulo, editorial, ejemplares, bajaLibro, fechaBajaLibro){
   this.codLibro = codLibro;
   this.isbn = isbn;
   this.autor = autor;
   this.titulo = titulo;
   this.editorial = editorial;
   this.ejemplares = ejemplares; 
   this.bajaLibro = bajaLibro;
   this.fechaBajaLibro = fechaBajaLibro;
}
//PRESTAMOS
function Prestamos(numPrestamo, numSocio, codLibro, fechaPrestamo, fechaDevolucion){
   this.numPrestamo = numPrestamo;
   this.numSocio = numSocio;
   this.codLibro = codLibro;
   this.fechaPrestamo = fechaPrestamo;
   this.fechaDevolucion = fechaDevolucion;
}

//CLASIFICACION
function Clasificacion(pasillo, estanteria, estante){
   this.pasillo = pasillo;
   this.estanteria = estanteria;
   this.estante = estante;
}














































































