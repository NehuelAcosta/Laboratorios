//indentificar elemntos
const coeficienteA = document.getElementById("coeficienteA");
const coeficienteB = document.getElementById("coeficienteB");
const coeficienteC = document.getElementById("coeficienteC");

function bhaskara() {
    let a = Number(coeficienteA.value);
    let b = Number(coeficienteB.value);
    let c = Number(coeficienteC.value);

    const discriminante = Math.pow(b, 2) - 4 * a * c;

    console.log(discriminante);

    //verifica si el resultado es correcto (discriminante = 0) (raiz unica)
    if (discriminante === 0) {

        let raizunica = -b / (2 * a);

        alert("Tiene una unica raiz: " + raizunica);

    }
    // El resultado es mayor a 0 (raiz doble)
    else if (discriminante > 0) {

        let raizdoble1 = (-b + Math.sqrt(discriminante)) / (2 * a);
        let raizdoble2 = (-b - Math.sqrt(discriminante)) / (2 * a);

        alert("Tiene raiz doble: \nx1 = " + raizdoble1 + "\nx2 = " + raizdoble2);
        // El resultado (discriminante) es menor a 0
    } else if (discriminante < 0) {
        alert("No tiene raices");
    }

}

