const contactos = [
    ["Luis", "677445909"],
    ["Andrés", "655694832"],
    ["Julio", "645890345"],
    ["Federico", "645637823"],
    ["Carlos", "633087345"],
    ["Antonio", "689234765"],
    ["Felipe", "612809272"],
    ["José", "644678123"],
    ["Juan", "600456234"],
    ["Isidro", "600111567"],
    ["José", "644678123"],
    ["Iván", "680805305"],
    ["Felipe", "612809272"],
    ["Miguel", "682101988"],
    ["Eduardo", "644161787"],
    ["Carlos", "633087345"],
    ["Luis", "677445909"],
    ["Isidro", "600111567"],
    ["Miguel", "682101988"],
    ["José", "644678123"],
    ["José", "644678123"],
    ["Iván", "680805305"],
    ["Antonio", "689234765"],
    ["Eduardo", "644161787"],
    ["Iván", "680805305"],
    ["Andrés", "655694832"],
    ["Carlos", "633087345"],
    ["Luis", "677445909"],
    ["Isidro", "600111567"],
    ["Miguel", "682101988"],
    ["Julio", "645890345"],
    ["Federico", "645637823"],
    ["Carlos", "633087345"],
    ["Antonio", "689234765"],
    ["Felipe", "612809272"]
];
// Array para almacenar contactos únicos
let contactoUnico = [];

// Iteramos sobre cada contacto
for (let i = 0; i < contactos.length; i++) {
    contactos[i];
    // Verificamos si el contacto ya está en el array de únicos
    let existe = false;

    for (let j = 0; j < contactoUnico.length; j++) {
        if (contactoUnico[j][0] === contactos[0] && contactoUnico[j][1] === contactos[1]) {
            existe = true; // Ya existe, no lo agregamos
            break;
        }
    }

    // Si no existe, lo agregamos
    if (!existe) {
        contactoUnico.push(contactos[i]);
    }
}

console.log(contactoUnico);

// SETS

const nombres = new Set(["Pepe","Juan","Pedro"]);

console.log(nombres.size);
nombres.clear();
nombres.add("Pepe");
nombres.add("Juan");
nombres.add("Pedro");
console.log(nombres);
nombres.add("Juan");
console.log(nombres);

const name = [
    ["Antonio","Pedro","Lucas"]
];

nombres.add(name[0]);
nombres.add(name[1]);
nombres.add(name[2]);

console.log(nombres);

// Pasar de set a nombres
name2 = [...nombres];
console.log(name2);