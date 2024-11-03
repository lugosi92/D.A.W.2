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
    let c = contactos[i];
    // Verificamos si el contacto ya está en el array de únicos
    let existe = false;

    for (let j = 0; j < contactoUnico.length; j++) {
        if (contactoUnico[j][0] === c[0] && contactoUnico[j][1] === c[1]) {
            existe = true; // Ya existe, no lo agregamos
            break;
        }
    }

    // Si no existe, lo agregamos
    if (!existe) {
        contactoUnico.push(c);
    }
}

console.log(contactoUnico);