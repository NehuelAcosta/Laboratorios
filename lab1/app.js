// Get calculator section divs
const domBasicCalcDiv = document.getElementById("calc-basic");
const domGeoCalcDiv = document.getElementById("calc-geo");
const domBaskaraCalcDiv = document.getElementById("calc-baskara");
const calcDivs = [domBasicCalcDiv, domGeoCalcDiv, domBaskaraCalcDiv];

// Get basic calculator operator and number2 field
const domBasicOperator = document.getElementById("basic-operator");
const domBasicCalcNumber2Field = document.getElementById("basic-number2-field");

// Get geometry forms
const domGeoCuadradoForm = document.getElementById("form-cuadrado");
const domGeoRectanguloForm = document.getElementById("form-rectangulo");
const domGeoCircunferenciaForm = document.getElementById("form-circunferencia");
const domGeoTrianguloForm = document.getElementById("form-triangulo");

// Get other forms
const domBasicForm = document.getElementById("form-basic");
const domBaskaraForm = document.getElementById("form-baskara");

// Group forms for easier handling
const geoForms = [
    domGeoCuadradoForm,
    domGeoRectanguloForm,
    domGeoCircunferenciaForm,
    domGeoTrianguloForm
];
const forms = [
    domGeoCuadradoForm,
    domGeoRectanguloForm,
    domGeoCircunferenciaForm,
    domGeoTrianguloForm,
    domBasicForm,
    domBaskaraForm
];

// Get navigation buttons
const domBtnShowBasicCalc = document.getElementById('btn-basic');
const domBtnShowGeoCalc = document.getElementById('btn-geo');
const domBtnShowBaskaraCalc = document.getElementById('btn-baskara');

// Get geometry navigation buttons
const domBtnGeoCuadrado = document.getElementById('geo-cuadrado');
const domBtnGeoRectangulo = document.getElementById('geo-rectangulo');
const domBtnGeoCircunferencia = document.getElementById('geo-circunferencia');
const domBtnGeoTriangulo = document.getElementById('geo-triangulo');

// Get result display elements
const domResultDiv = document.getElementById('result-div');
const domResultText = document.getElementById('result-text');

// Store original display values for elements
const originalElementDisplays = {};

// Show an element, restoring its previous display value if hidden
function showElement(element) {
    // If already visible, do nothing
    if (element.style.display != 'none') return;

    // Restore previous display or use 'inherit' as fallback
    if (element in originalElementDisplays)
        element.style.display = originalElementDisplays[element];
    else
        element.style.display = 'inherit';
}

// Hide an element and remember its current display value
function hideElement(element) {
    // If already hidden, do nothing
    if (element.style.display == 'none') return;

    // Save current display value or use 'inherit' if already none
    if (element.style.display != 'none')
        originalElementDisplays[element] = element.style.display;
    else
        originalElementDisplays[element] = 'inherit';

    element.style.display = 'none';
}

// Hide all calculator sections
function hideAllCalcs() {
    calcDivs.forEach(calcDiv => {
        hideElement(calcDiv);
    });
}

// Show basic calculator section
function showBasicCalc() {
    hideAllCalcs();
    showElement(domBasicCalcDiv);
}

// Show geometry calculator section and default to square
function showGeoCalc() {
    hideAllCalcs();
    showGeoCuadrado();
    showElement(domGeoCalcDiv);
}

// Show Baskara calculator section
function showBaskaraCalc() {
    hideAllCalcs();
    showElement(domBaskaraCalcDiv);
}

// Hide all geometry forms
function hideGeoCalcs() {
    geoForms.forEach(geoDiv => {
        hideElement(geoDiv);
    });
}

// Show specific geometry forms
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

// Hide result display
function hideResult() {
    hideElement(domResultDiv);
}

// Show result as success (green)
function showSuccessResult(message) {
    domResultText.innerText = message;
    domResultDiv.style.backgroundColor = 'green';
    showElement(domResultDiv);
}

// Show result as failure (red)
function showFailureResult(message) {
    domResultText.innerText = message;
    domResultDiv.style.backgroundColor = 'red';
    showElement(domResultDiv);
}

// Show/hide number2 field based on selected operator
domBasicOperator.addEventListener('change', e => {
    let selection = e.target.value;
    if (selection == 'sqrt')
        hideElement(domBasicCalcNumber2Field);
    else
        showElement(domBasicCalcNumber2Field);
});

// Navigation button event listeners
domBtnShowBasicCalc.addEventListener('click', () => {
    showBasicCalc();
});

domBtnShowGeoCalc.addEventListener('click', () => {
    showGeoCalc();
});

domBtnShowBaskaraCalc.addEventListener('click', () => {
    showBaskaraCalc();
});

// Geometry navigation button event listeners
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

// Handle form submissions for all forms
forms.forEach(form => {
    form.addEventListener("submit", e => {
        e.preventDefault();

        // Get form action and method
        let action = form.action;
        let method = form.method;
        let formData = new FormData(form);

        // Submit form via fetch
        fetch(action, {
            method: method,
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // Show result as success or failure
                let showResultMethod = data.isFailure ? showFailureResult : showSuccessResult;
                showResultMethod(data.content);
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});

// Initialize UI: show basic calc and hide result
showBasicCalc();
hideResult();