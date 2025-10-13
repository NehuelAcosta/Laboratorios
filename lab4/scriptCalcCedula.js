// Guardar DOM de las etiquetas
const DOM_bloqueValidar = document.getElementById("block-validar");
const DOM_bloqueCrear = document.getElementById("block-crear");

const DOM_cedulaVerificar = document.getElementById("cedula-verificar");
const DOM_cedulaCrear = document.getElementById("cedula-crear");

const DOM_resultMsg = document.getElementById("result-msg");
const DOM_resultDigit = document.getElementById("result-digit");

/* Mostrar bloques */

function showValidarBlock() {
    hideMessage();
    DOM_bloqueCrear.classList.add("hidden");
    DOM_bloqueValidar.classList.remove("hidden");
}

function showCrearBlock() {
    hideMessage();
    DOM_bloqueValidar.classList.add("hidden");
    DOM_bloqueCrear.classList.remove("hidden");
}


/* Funciones varias */

function cantidadCifrasIngresadas(cedula, expectedLength) {
    if (!(cedula.length == expectedLength)) { //Si no tiene exactamente 8 cifras, borra mensajes de éxito y muestra un error.
        showMessage(`La cédula debe tener ${expectedLength} cifras`, false);
        return false;
    } else {
        return true;
    }
}

function calcularDigitoVerificador(cedula) {
    // Cada dígito de la cédula se multiplicará por su respectivo numero base 
    // (excepto el número identificador)
    const numsBase = [2, 9, 8, 7, 6, 3, 4];

    // Pasar cada caracter a su valor numerico, excepto el último 
    for (let i = 0; i < cedula.length; i++) {
        cedula[i] = Number(cedula[i]);
    }

    // Sumar las unidades del resultado de cada multiplicacion
    let suma = 0;
    for (let i = 0; i < cedula.length; i++) {
        suma += (cedula[i] * numsBase[i]) % 10;
    }

    let numVerificador = 10 - (suma % 10);

    if (numVerificador === 10) {
        return 0;
    } else {
        return numVerificador;
    }
}

function showMessage(message, wasSuccess) {
    DOM_resultMsg.classList.remove("hidden");

    if (wasSuccess) {
        DOM_resultMsg.classList.remove("error-msg");
        DOM_resultMsg.classList.add("success-msg");
    } else {
        DOM_resultMsg.classList.remove("success-msg");
        DOM_resultMsg.classList.add("error-msg");
    }

    DOM_resultMsg.innerText = message;
}

function hideMessage() {
    DOM_resultMsg.classList.add("hidden");
}

function showResultDigit(content){
    DOM_resultDigit.innerText = content;
}


/* Funcion de validar la cedula */

function validarCedula() {
    const cedula = DOM_cedulaVerificar.value; //Toma lo que escribió el usuario (DOM_cedula.value).

    if ( !(cantidadCifrasIngresadas(cedula, 8))){
        return;
    }

    // Tomamos los digitos que no son el verificador
    const digitosCentrales = cedula.slice(0, -1);

    // Tomar el ultimo digito
    const ultimoDigito = Number(cedula[cedula.length - 1]);

    // Calcular el digito verificador segun los valores dados
    const digitoCalculado = calcularDigitoVerificador(digitosCentrales);

    // Comprobar que el digito verificador sea correcto y decirle al usuario
    if (ultimoDigito === digitoCalculado) {
        showMessage("La cédula es válida", true);
    } else if (ultimoDigito === 0 && digitoCalculado === 0) {
        showMessage("La cédula es válida", true);
    } else {
        showMessage("La cédula no es válida", false)
    }
}


/* Funcion de crear digito verificador */

function crearDigitoVerificador() {
    const cedula = DOM_cedulaCrear.value; //Toma lo que escribió el usuario (DOM_cedula.value).

    if ( !(cantidadCifrasIngresadas(cedula, 7))){
        showResultDigit("?", false);
        return;
    }

    const digitoVerificador = calcularDigitoVerificador(cedula);

    showResultDigit(digitoVerificador);
    hideMessage();
}