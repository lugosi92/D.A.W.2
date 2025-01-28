//Esquema de BOM-DOM

/**
 * La web está formada por el objeto Window, el cual se divide por:
 *  - Contenido de la web:
 *    - Document (DOM)
 *  - Contenedor de la web (BOM):
 *    - Screen 
 *    - History
 *    - Location
 *    - Navigator
 *    - Console
 *    - Event ??
 */

//WINDOW
//Inner: el tamaño del navegador usandose
window.innerHeight;
window.innerWidth;

//Outer: El tamaño de la ventana , (condols + utl...)


scroll(0,500)

getSelection().toString()

find("Alphafly")
true

open("https://adidas.es")

scrol(0,200)
scrollBy(0,200)

//NAVIGATOR
navigator.userAgent
'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36'

navigator.cookieEnabled
true

navigator.storage

//screen

screen.height
screen.width

screen.color

//location

location.href
location.hostname
//recagrfagr la pagina


//history

history.go(-1)
history.length


//DOM-ESQUEMA                                   

//Nodos: elementos y atributos
//12 nodos atributo, elemtno y texto  

//1 clase  e ID
getElementByid()
getElementByclassName()
innerHTML
//elementos con la misma clase se puede trabajr como array pero no es un array es una coleccion

//pasar collecion a array con la propagacion


//2 Tag name -> div, p , ...
getElementByTagName()

//3 querySelector
document.querySelector("p"); //seleccionar elementos 
document.querySelector("p.example"); //seleccionar elementos p con clase example  

//validacion email poner en rojo 
const nodeList = document.querySelectorAll("a[target]");
for(let i = 0; i < nodeList.length; i++){
    document.querySelector("p.email").computedStyleMap.backgrandcolor(red); 
}

//seleccionar padres hijos y hermanos

//arbol es muy grande hacemos referncia al contenedor por ejemplo

head.getElementById()
body.getElementById()

//text solo coje el texto plano  y inner todo
textContent
innerHTML

//hasatributte
//crear elemento
    //1createElement const para = document.createElement("p");
    //2añadir document.body.appendChild(para);


//textnode

//ejecutar funcion integrada en un boton  