
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

//----------------------------------CONSTRUCTORES------------------------------
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
//LIBROS
function Libros(codLibro, isbn, autor, titulo, editorial, ejemplares){
    this.codLibro = codLibro;
    this.isbn = isbn;
    this.autor = autor;
    this.titulo = titulo;
    this.editorial = editorial;
    this.ejemplares = ejemplares; 
}
//PRESTAMOS
function Prestamos(numPrestamo, numSocio, codLibro, fechaPrestamo, fechaDevolucion){
    this.numPrestamo = numPrestamo;
    this.numSocio = numSocio;
    this.codLibro = codLibro;
    this.fechaPrestamo = fechaPrestamo;
    this.fechaDevolucion = fechaDevolucion;
}

/*------------------------------------------------------------------------------*/
// Separamos por lineas y retorno de carro
const lineas = contenido.split("\r\n"); 
const encabezado = lineas[0];


if (encabezado.includes("telefono") && encabezado.includes("email")) {
/*----------------------------------LEER CVS lectores-----------------------------*/
console.log("CSV - LECTORES");
 // Creamos conjunto
 bancoLectores = new Set(lineas);
 bancoLectores.delete("");
 // PASAR DE CONJUNTO A ARRAY
 arrayLectores = [...bancoLectores];

 arrayLectores.forEach(linea => {
    let dato = linea.split(",");
    let lector = new Lectores(dato[0],dato[1],dato[2], 
                              dato[3],dato[4], false , null );
    arrayLectores.push(lector);
 });

 console.log(arrayLectores);

}
/*------------------------------------------------------------------------------*/

if (encabezado.includes("codLibro") && encabezado.includes("isbn")) {
/*----------------------------------LEER CVS libros-----------------------------*/
console.log("CSV - LIBROS");

bancoLibros= new Set(lineas);

bancoLibros.delete("");
 // PASAR DE CONJUNTO A ARRAY
 arrayLibros = [...bancoLibros];

 arrayLibros.forEach(linea => {
    let dato = linea.split(",");
    let libro = new Libros(dato[0],dato[1],dato[2], 
                              dato[3],dato[4], dato[5]);
    arrayLibros.push(libro);
    
 });
 console.log(arrayLibros);
}


/*----------------------------------FUNCIONES lectores-----------------------------*/

//altaLector: Se preguntará por los datos de un nuevo lector, se comprobará que están todos y que son correctos; a continuación, se dará de alta

function  altaLector(){
    let numSocio = prompt("Introduce el numero de socio");
    let nombre = prompt("Introduce nombre de usuario");
    let apellido = prompt("Introduce apellido de usuario");
    let telefono = prompt("Introduce numero de telefono");
    let email = prompt("Introduce email del usuario");
    let lector = new Lectores(numSocio,nombre,apellido,telefono,email, false, null);
    bancolectores.push(lector);
}

// altaLector()


//bajaLector: La baja se realizará añadiendo un campo de baja, en la información del lector que contendrá: bajaLector (true/false) y la fecha de baja.
//Se conservará toda la información del lector, para poder analizar los préstamos tanto antiguos como pendientes

function bajaLector(){

    let numSocio = prompt("Introduce el numeor de socio a dar de baja");

    const fechaActual = new Date();

    bancolectores.forEach(objeto => {
        if(objeto.numSocio == numSocio){
            objeto.bajaLector = true;
            objeto.fechaBaja = fechaActual;
        }
    });

}

// bajaLector();


// modifLector: Se utilizará para modificar cualquier dato del lector, sea porque ha cambiado o porque es incorrecto. 
// Se preguntará por el dato a modificar, se introducirá el nuevo dato y se actualizará

function modifLector(){

    numSocio = prompt("Introduce el numeor de socio a MODIFICAR");

    bancolectores.forEach(objeto => {
        if(objeto.numSocio == numSocio){
            atributo = prompt("Que valor quieres modificar");
            nuevoValor = prompt("Introduce nuevo usuario");
            objeto[atributo]= nuevoValor;
        }
    });
}

// modifLector();


//comprobarEmails: Se comprobará si los email tienen un formato correcto y 
//se dará un listado de los que no son válidos (Lector + email)

/*----------------------------------FUNCIONES libros-----------------------------*/
}, false);