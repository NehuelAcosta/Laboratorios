const bloqueConversor = document.getElementById("bloque-conversor");
const bloqueCalculadora = document.getElementById("bloque-calculadora");

const inputConversor = document.getElementById("input-conversor");
const selectConversor = document.getElementById("select-conversor");

const input1CalcBase = document.getElementById("calcBases-input1");
const input2CalcBase = document.getElementById("calcBases-input2");
const select1CalcBase = document.getElementById("calcBases-select1");
const select2CalcBase = document.getElementById("calcBases-select2");

/* Funciones para ver u ocultar los bloques */

function showBlockConversor() {
    bloqueConversor.classList.remove("hidden");
    bloqueCalculadora.classList.add("hidden");
}

function showBlockCalculadora() {
    bloqueCalculadora.classList.remove("hidden");
    bloqueConversor.classList.add("hidden");
}


/* Funciones para asegurarse de la validez de los input */

function validarInput(input, select){
    let regex;

    // Dependiendo de la opcion que el usuario eligio en el select, el regex va a ser uno u otro
    switch (select.value){
        case '10':
            regex = /[^0-9]/g;
            break;

        case '2': 
            regex = /[^01]/g;
            break;

        case '8':
            regex = /[^0-7]/g;
            break;

        case '16':
            regex = /[^0-9a-fA-F]/g;
            break;

        default:
            console.log("seleccione una opcion");
    }

    // Si la tecla presionada esta dentro del regex, se cambia por un caracter vacio
    input.value = input.value.replace(regex, '');
}


/* Event Listeners */

// El evento 'input' se activa cada cez que el usuario ingrese un caracter dentro de una cierta etiqueta
inputConversor.addEventListener('input', e =>{
    validarInput(e.target, selectConversor);
});

// En este caso, el evento 'change' se activa cuando el usuario elige una opcion en la etiqueta select
selectConversor.addEventListener('change', () => {
    inputConversor.value = '';
});

input1CalcBase.addEventListener('input', e =>{
    validarInput(e.target, select1CalcBase);
});

select1CalcBase.addEventListener('change', () => {
    input1CalcBase.value = '';
});

input2CalcBase.addEventListener('input', e =>{
    validarInput(e.target, select2CalcBase);
});

select2CalcBase.addEventListener('change', () => {
    input2CalcBase.value = '';
});