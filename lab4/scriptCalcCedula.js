// Guardar DOM del input
const DOM_cedula = document.getElementById("cedula");
const DOM_errMsg = document.getElementById("errMsg");
const DOM_successMsg = document.getElementById("successMsg");
let cedula = [];

function validarInput() {
    cedula = DOM_cedula.value;

    if (! (cedula.length == 8)){
        borrarSuccess();
        DOM_errMsg.textContent = "ERROR: La cedula debe tener 8 cifras";
    } else {
        validarCedula();
    }
}

function validarCedula() {
    // Cada dígito de la cédula se multiplicará por su respectivo numero base 
    // (excepto el número identificador)
    const numsBase = [2, 9, 8, 7, 6, 3, 4];

    // Guardar el valor numérico del último dígito
    let numVerificador = Number(cedula[cedula.length - 1]);

    // Pasar cada caracter a su valor numerico, excepto el último
    for (let i = 0; i < cedula.length - 1; i++) {
        cedula[i] = Number(cedula[i]);
    }

    let suma = 0;
    for (let i = 0; i < cedula.length - 1; i++) {
        suma += (cedula[i] * numsBase[i]) % 10;
    }

    let resto = 10 - (suma % 10);

    console.log("Resto: " + resto);
    console.log("Numero Verificador: " + numVerificador);

    if (numVerificador === resto) {
        borrarErr();
        DOM_successMsg.textContent = "La cedula es valida";
    } else if (resto === 10 && numVerificador === 0){
        borrarErr();
        DOM_successMsg.textContent = "La cedula es valida";

    } else {
        borrarSuccess();
        DOM_errMsg.textContent = "ERROR: La cedula no es valida";
    }
}  

function borrarSuccess(){
    DOM_successMsg.textContent = "";
}

function borrarErr(){
    DOM_errMsg.textContent = "";
}