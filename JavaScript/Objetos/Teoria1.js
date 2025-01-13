const cliente={
    nombre:"Khalid",
    apellido:"Benoukhiye",
    telefono:"650883881",
    ciudad:"Madrid"
};

const viaje={
    origen:"Madrid",
    destino:"Paris",
    duracion:"7 dias",
    pais:"Francia",
    trayecto: function(){
        return this.origen+"-"+this.destino;
    }
};

// function trayecto(viaje){
//     console.log(viaje.origen+"-"+viaje.destino);
// }
// trayecto(viaje);

for (const key in viaje) {
   
    if(typeof viaje[key]!="function"){
        console.log(key+ " es " + viaje[key]);
    }
    
}
console.log("-----------");

function Viaje(origen,destino,duracion,pais){
    this.origen=origen;
    this.destino=destino;
    this.duracion=duracion;
    this.pais=pais;
}

const viaje2= new Viaje("Madrid","Berlin","10 dias","Alemania");

for (const key in viaje2) {
   
    if(typeof viaje2[key]!="function"){
        console.log(key+ " es " + viaje2[key]);
    }
    
}

console.log("-----------");


// VIAJES

const Mallorca = new Viaje("Madrid", "Mallorca", "10 dias", "España");
console.log(Mallorca);
const Londres = new Viaje("Madrid", "Londres", "10 dias", "Reino Unido");
console.log(Londres);
const Burgos = new Viaje("Madrid", "Burgos", "10 dias", "España");
console.log(Burgos);
const Toledo = new Viaje("Madrid", "Toledo", "10 dias", "España");
console.log(Toledo);
// Borrar

delete(Toledo.pais);
Toledo.pais="España";


console.log("-----------");

// constructor
function cliente2(nombre, apellido,ciudad,miViaje,telefono, contratado){
    this.nombre=nombre;
    this.apellido=apellido;
    this.ciudad=ciudad;
    this.miViaje = miViaje;
    this.telefono = telefono;
    this.contratado = function(){
        return miViaje ? true : false;
    }
}

const Javier = new cliente2("Javier", "Pedrosa", "Madrid",  "Avila","666666666");

// Imprimir
for (const key in Javier) {

    if(typeof Javier[key] != "function"){
        console.log(key + " es " + Javier[key]);    
    }
}
console.log(Javier.contratado());


const Rodri = new cliente2("Javier", "Pedrosa", "Madrid",  Burgos,"666666666");

console.log(Burgos.duracion);





