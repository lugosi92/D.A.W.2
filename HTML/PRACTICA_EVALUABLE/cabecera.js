// Selecciona la cabecera
const header = document.querySelector('#header');

// Detecta el desplazamiento de la ventana
window.addEventListener('scroll', () => {
    if (window.scrollY > 950) { // Si el desplazamiento es mayor a 50px
        header.classList.add('scroll-active'); // Añade la clase
    } else {
        header.classList.remove('scroll-active'); // Elimina la clase
    }
});

// Fecha objetivo
const fechaObjetivo = new Date('2024-12-31T23:59:59'); // Cambia esta fecha a tu objetivo

function actualizarContador() {
    const ahora = new Date();
    const diferencia = fechaObjetivo - ahora; // Diferencia en milisegundos

    if (diferencia <= 0) {
        // Si ya pasó la fecha objetivo, poner todo en 0
        document.querySelector(".date div:nth-child(1) p:first-child").innerText = "0";
        document.querySelector(".date div:nth-child(2) p:first-child").innerText = "0";
        document.querySelector(".date div:nth-child(3) p:first-child").innerText = "0";
        document.querySelector(".date div:nth-child(4) p:first-child").innerText = "0";
        clearInterval(intervalo); // Detiene el intervalo
        return;
    }

    // Conversión de tiempo
    const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
    const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    // Actualizar el contador en el DOM
    document.querySelector(".date div:nth-child(1) p:first-child").innerText = dias;
    document.querySelector(".date div:nth-child(2) p:first-child").innerText = horas;
    document.querySelector(".date div:nth-child(3) p:first-child").innerText = minutos;
    document.querySelector(".date div:nth-child(4) p:first-child").innerText = segundos;
}

// Actualiza el contador cada segundo
const intervalo = setInterval(actualizarContador, 1000);

// Ejecuta la función al cargar la página
actualizarContador();
