// Guardar DOM del input
const DOM_fichaEstudiante = document.getElementById("fichaEstudiante");
const DOM_cedula = document.getElementById("cedula");
const DOM_errMsg = document.getElementById("errMsg");

DOM_fichaEstudiante.addEventListener("submit", function(event) {
    event.preventDefault();

    // Validar inputs
    if (!cedulaValida()){
        return;
    }

    DOM_fichaEstudiante.submit();
});

// Comprobar que la cedula ingresada sea valida
function cedulaValida() {
    // Guardar la cedula como un array de caracteres
    let cedula = DOM_cedula.value;

    if (!(cedula.length === 8)){
        showErrMsg();
        DOM_errMsg.textContent = "ERROR: La cedula debe tener 8 cifras";
        return false;
    }

    // Cada dígito de la cédula se multiplicará por su respectivo numero base 
    // (excepto el número identificador)
    const numsBase = [2, 9, 8, 7, 6, 3, 4];

    // Guardar el valor numérico del último dígito
    let numVerificador = Number(cedula[cedula.length - 1]);

    // Pasar cada caracter a su valor numerico, excepto el último
    for (let i = 0; i < cedula.length - 1; i++) {
        cedula[i] = Number(cedula[i]);
    }

    // Multiplicar cada digito con su respectivo número base
    // Dividir cada resultado entre 10 y sumar el resto de cada uno
    let suma = 0;
    for (let i = 0; i < cedula.length - 1; i++) {
        suma += (cedula[i] * numsBase[i]) % 10;
    }

    // El digito verificador debe ser el valor que falta para alcanzar la proxima decena
    let resto = 10 - (suma % 10);

    if (!(numVerificador === resto)) {
        showErrMsg();
        DOM_errMsg.textContent = "ERROR: La cedula no es valida";
        return false;
    }

    return true;
}  

function showErrMsg(){
    DOM_errMsg.setAttribute("style", "color: red; display: block;");
}