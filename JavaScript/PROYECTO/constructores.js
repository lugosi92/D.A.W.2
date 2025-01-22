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




//----------------------------------FUNCIONES lectores-------------------------------

const bancolectores = [];

let lector = new Lectores(1,"jesus","villaverde" ,"123456","hola@gmail.com", false, null);
let lector2 = new Lectores(2,"ivan","soria" ,"987654","hola@gmail.com", false, null);
bancolectores.push(lector);
bancolectores.push(lector2);

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
console.log(bancolectores);

//comprobarEmails: Se comprobará si los email tienen un formato correcto y 
//se dará un listado de los que no son válidos (Lector + email)