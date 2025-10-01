// -------------------- DOM Elements --------------------

// Obtener los divs de cada sección de calculadora
const domBasicCalcDiv = document.getElementById("calc-basic");
const domGeoCalcDiv = document.getElementById("calc-geo");
const domBaskaraCalcDiv = document.getElementById("calc-baskara");
const calcDivs = [domBasicCalcDiv, domGeoCalcDiv, domBaskaraCalcDiv]; 
// Array con todas las secciones para poder ocultarlas o mostrarlas fácilmente

// Obtener select del operador y el campo del segundo número en calculadora básica
const domBasicOperator = document.getElementById("basic-operator");
const domBasicCalcNumber2Field = document.getElementById("basic-number2-field");

// Obtener los formularios de geometría
const domGeoCuadradoForm = document.getElementById("form-cuadrado");
const domGeoRectanguloForm = document.getElementById("form-rectangulo");
const domGeoCircunferenciaForm = document.getElementById("form-circunferencia");
const domGeoTrianguloForm = document.getElementById("form-triangulo");

// Obtener otros formularios
const domBasicForm = document.getElementById("form-basic");
const domBaskaraForm = document.getElementById("form-baskara");

// Agrupar formularios de geometría
const geoForms = [
    domGeoCuadradoForm,
    domGeoRectanguloForm,
    domGeoCircunferenciaForm,
    domGeoTrianguloForm
];

// Agrupar todos los formularios para manejarlos fácilmente
const forms = [
    domGeoCuadradoForm,
    domGeoRectanguloForm,
    domGeoCircunferenciaForm,
    domGeoTrianguloForm,
    domBasicForm,
    domBaskaraForm
];

// Obtener botones de navegación principal
const domBtnShowBasicCalc = document.getElementById('btn-basic');
const domBtnShowGeoCalc = document.getElementById('btn-geo');
const domBtnShowBaskaraCalc = document.getElementById('btn-baskara');

// Obtener botones de navegación dentro de geometría
const domBtnGeoCuadrado = document.getElementById('geo-cuadrado');
const domBtnGeoRectangulo = document.getElementById('geo-rectangulo');
const domBtnGeoCircunferencia = document.getElementById('geo-circunferencia');
const domBtnGeoTriangulo = document.getElementById('geo-triangulo');

// Obtener elementos de resultado
const domResultDiv = document.getElementById('result-div');
const domResultText = document.getElementById('result-text');

// Almacenar los valores originales de display de los elementos
const originalElementDisplays = {};


// -------------------- Show / Hide Elements --------------------

// Mostrar un elemento, restaurando su display original si estaba oculto
function showElement(element) {
    if (element.style.display != 'none') return; // Si ya es visible, no hacer nada

    // Restaurar valor original o usar 'inherit' por defecto
    if (element in originalElementDisplays)
        element.style.display = originalElementDisplays[element];
    else
        element.style.display = 'inherit';
}

// Ocultar un elemento y recordar su valor de display
function hideElement(element) {
    if (element.style.display == 'none') return; // Si ya está oculto, no hacer nada

    // Guardar valor actual de display o usar 'inherit'
    if (element.style.display != 'none')
        originalElementDisplays[element] = element.style.display;
    else
        originalElementDisplays[element] = 'inherit';

    element.style.display = 'none';
}


// -------------------- Calculator Section Management --------------------

// Ocultar todas las calculadoras
function hideAllCalcs() {
    calcDivs.forEach(calcDiv => {
        hideElement(calcDiv);
    });
}

// Mostrar calculadora básica
function showBasicCalc() {
    hideAllCalcs();
    showElement(domBasicCalcDiv);
}

// Mostrar calculadora de geometría y mostrar cuadrado por defecto
function showGeoCalc() {
    hideAllCalcs();
    showGeoCuadrado();
    showElement(domGeoCalcDiv);
}

// Mostrar calculadora de Bhaskara
function showBaskaraCalc() {
    hideAllCalcs();
    showElement(domBaskaraCalcDiv);
}


// -------------------- Geometry Forms Management --------------------

// Ocultar todos los formularios de geometría
function hideGeoCalcs() {
    geoForms.forEach(geoDiv => {
        hideElement(geoDiv);
    });
}

// Mostrar formularios específicos de geometría
function showGeoCuadrado() {
    hideGeoCalcs();
    showElement(domGeoCuadradoForm);
}

function showGeoRectangulo() {
    hideGeoCalcs();
    showElement(domGeoRectanguloForm);
}

function showGeoCircunferencia() {
    hideGeoCalcs();
    showElement(domGeoCircunferenciaForm);
}

function showGeoTriangulo() {
    hideGeoCalcs();
    showElement(domGeoTrianguloForm);
}


// -------------------- Result Display Management --------------------

// Ocultar el div de resultado
function hideResult() {
    hideElement(domResultDiv);
}

// Mostrar resultado de éxito (verde)
function showSuccessResult(message) {
    domResultText.innerText = message;
    domResultDiv.style.backgroundColor = 'green';
    showElement(domResultDiv);
}

// Mostrar resultado de error/fallo (rojo)
function showFailureResult(message) {
    domResultText.innerText = message;
    domResultDiv.style.backgroundColor = 'red';
    showElement(domResultDiv);
}


// -------------------- Event Listeners --------------------

// Cambiar visibilidad del campo number2 según el operador seleccionado
domBasicOperator.addEventListener('change', e => {
    let selection = e.target.value;
    if (selection == 'sqrt') // Si es raíz cuadrada, ocultar number2
        hideElement(domBasicCalcNumber2Field);
    else
        showElement(domBasicCalcNumber2Field);
});

// Botones de navegación principal
domBtnShowBasicCalc.addEventListener('click', () => {
    showBasicCalc();
});

domBtnShowGeoCalc.addEventListener('click', () => {
    showGeoCalc();
});

domBtnShowBaskaraCalc.addEventListener('click', () => {
    showBaskaraCalc();
});

// Botones de navegación de geometría
domBtnGeoCuadrado.addEventListener('click', () => {
    showGeoCuadrado();
});

domBtnGeoRectangulo.addEventListener('click', () => {
    showGeoRectangulo();
});

domBtnGeoCircunferencia.addEventListener('click', () => {
    showGeoCircunferencia();
});

domBtnGeoTriangulo.addEventListener('click', () => {
    showGeoTriangulo();
});


// -------------------- Form Submissions --------------------

// Manejar envíos de todos los formularios
forms.forEach(form => {
    form.addEventListener("submit", e => {
        e.preventDefault(); // Evitar recarga de página

        // Obtener action, method y datos del formulario
        let action = form.action;
        let method = form.method;
        let formData = new FormData(form);

        // Enviar datos con fetch
        fetch(action, {
            method: method,
            body: formData
        })
            .then(response => response.json()) // Esperar respuesta JSON
            .then(data => {
                // Mostrar resultado según éxito o fallo
                let showResultMethod = data.isFailure ? showFailureResult : showSuccessResult;
                showResultMethod(data.content);
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});


// -------------------- Initialize UI --------------------

// Mostrar calculadora básica por defecto y ocultar resultados
showBasicCalc();
hideResult();
