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
//----------------------------------CONSTRUCTORES------------------------------

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
 
 //LECTORES
 function Lectores(numSocio, nombre, apellido, telefono, email, bajaLector, fechaBaja){
     this.numSocio = numSocio;
     this.nombre = nombre;
     this.apellido = apellido;
     this.telefono = telefono;
     this.email = email;
     this.bajaLector = bajaLector;
     this.fechaBaja = fechaBaja;
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

const arrayLibros = [];
const arrayLectores = [];
/*-------------------------------------------------------LEER CVS LIBROS-------------------------------------------------*/
//Guardamos en una variable libros donde se ubica en elHTML
let libros = document.getElementById('importar-input-libros');

//Evento, escuchando si existe algun cambio en la variable libro
libros.addEventListener('change', async (e) => {
    
    /*-----------------BLOQUE 1-----------------*/
    // Obtiene el primer archivo seleccionado en el input de tipo "file"
    const archivo = e.target.files[0]; 

    // Verifica si no se seleccionó ningún archivo y detiene la ejecución si es el caso
    if (!archivo) { 
        return;
    }

    // Lee el contenido del archivo de forma asíncrona y lo almacena en una variable
    const contenidoLibros = await leerArchivo(archivo);

    /*-----------------BLOQUE 2-----------------*/
    //Separa las lineas, borra duplicados y espacios en blanco
    const lineas = contenidoLibros.split("\r\n"); 
    conjuntoLibros = new Set(lineas);  
    conjuntoLibros.delete("");

    /*-----------------BLOQUE 3-----------------*/
    //Recorremos el conjutnoLectores y lo agregamos en un array de objetos separando los datos por ","
    conjuntoLibros.forEach(linea => {
        let dato = linea.split(",");
        let libro = new Libros(dato[0],dato[1],dato[2], 
                                  dato[3],dato[4], dato[5], false, null);
        arrayLibros.push(libro);
        
     });
     
console.log(arrayLibros);
});

/*-------------------------------------------------------LEER CVS LECTORES-------------------------------------------------*/ 
let lectores = document.getElementById('importar-input-lectores');

lectores.addEventListener('change', async (e) => {
    /*-----------------BLOQUE 1-----------------*/
    // Obtiene el primer archivo seleccionado en el input de tipo "file"
    const archivo = e.target.files[0]; 

    // Verifica si no se seleccionó ningún archivo y detiene la ejecución si es el caso
    if (!archivo) { 
        return;
    }

    // Lee el contenido del archivo de forma asíncrona y lo almacena en una variable
    const contenidoLectores = await leerArchivo(archivo);
    
    
    /*-----------------BLOQUE 2-----------------*/
    //Separa las lineas, borra duplicados y espacios en blanco
    const lineas = contenidoLectores.split("\r\n");
    conjuntoLectores = new Set(lineas);
    conjuntoLectores.delete("");

     /*-----------------BLOQUE 3-----------------*/
    //Recorremos el conjutnoLectores y lo agregamos en un array de objetos separando los datos por ","
    conjuntoLectores.forEach(linea => {
        let dato = linea.split(",");
        let lector = new Lectores(dato[0],dato[1],dato[2],dato[3],dato[4], false , null);
        arrayLectores.push(lector);
    });
    
console.log(arrayLectores);
});


/*-------------------------------------------------------FUNCIONES LECTORES-------------------------------------------------*/ 

function altaLector(){

    //Validaciones de variables
    let regexSocio = /^8[0-9]{2}$/;
    let nombreApellido = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ-]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ-]+)?$/;
    const regexTelefono = /^[6789]\d{8}$/;
    const regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z]+\.(es|com|net|fr|it|pt|org)$/;
    
    //Solicitud de valores
    let numSocio = prompt("Introduce el NºSOCIO entre 800-899");
    let nombre = prompt("Introduce nombre");
    let apellido = prompt("Introduce apellido");
    let telefono = prompt("Introduce NºTelefono");
    let email = prompt("Introduce email");

    //Activar si existe valor nulo o no cumple con la logica de negocio
    let errorF = false;
    let errorV = false;

    //Validar valores vacios
    if(numSocio == null || nombre == null  || apellido == null  || telefono == null  || email == null  || nombre == null ){
        errorF = true;
    //Validar logica de negocio
    }else if(!regexSocio.test(numSocio) || !nombreApellido.test(nombre) || !nombreApellido.test(apellido) || 
    !regexTelefono.test(telefono) || !regexEmail.test(email)){
        errorV = true;800
    }

    //Imprimri errores si viola la logica de negocio
    if(errorF == true){
        alert("No pueden existir datos vacios")
    }else if(errorV == true){
        alert("El formato de algun dato es incorrecto")
    }

    //Si no existe errores instanciar objeto en el listado de Lectores
    if(errorF == false && errorV == false){
        const lector = new Lectores(numSocio,nombre,apellido,telefono,email,false, null);
        arrayLectores.push(lector);
    }
    console.log(arrayLectores);

}


















































































