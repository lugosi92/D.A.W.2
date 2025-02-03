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
// console.log(contenido);
    mostrarContenido(contenido);

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


/*----------------------------------LEER CVS lectores-----------------------------*/

//ALMACENAMIENTO DE DATOS
const arrayLectores = [];
const arrayLibros = [];













































































}, false);