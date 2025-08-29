// Guardar DOM de las etiqutas
const DOM_nota = document.getElementById("nota");
const DOM_promedio = document.getElementById("promedio");
const DOM_calificaciones = document.getElementById("calificaciones");
const DOM_situacion = document.getElementById("situacion");
const DOM_errorMsg = document.getElementById("errorMsg");
const p_tags = document.getElementsByTagName("p");
// Definir array de las notas
let notas = [];

function agregarNota() {
    let nota = Number(DOM_nota.value);

    if (nota < 0) {
        DOM_errorMsg.textContent = "ERROR: La nota no puede ser negativa";
        return;
    } else if (nota > 12){
        DOM_errorMsg.textContent = "ERROR: La nota no puede ser mayor a 12";
        return;
    } else {
        DOM_errorMsg.textContent = "";
    }

    notas = addToArray(notas, nota);

    promedio = calcPromedio(notas);

    DOM_promedio.textContent = "Promedio: " + promedio;
    DOM_calificaciones.innerHTML = "";

    for (let i = 0; i < notas.length; i++) {
        const p = document.createElement("p");
        p.textContent = "Calificación " + (i + 1) + ": " + notas[i];
        DOM_calificaciones.appendChild(p);
    }

    let situacion;

    if (promedio <= 3){
        situacion = "Exámen febrero";
    } else if (promedio <= 7){
        situacion = "Exámen reglamentado";
    } else {
        situacion = "Exonerado";
    }

    DOM_situacion.textContent = "Situación académica: " + situacion;
}

function arrayDisplace(array) {
    let newArray = [];
    for (let i = 0; i < array.length - 1; i++) {
        newArray[i + 1] = array[i];
    }

    return newArray;
}

function addToArray(array, value) {
    if (array.length >= 10) {
        array = arrayDisplace(array);
        array[0] = value;
    } else {
        array[array.length] = value;
    }

    return array;
}

function calcPromedio(array){
    let suma = 0;
    for (let i = 0; i < array.length; i++) {
        suma += array[i];
    }

    promedio = suma / array.length;
    return promedio.toFixed(1);
}
