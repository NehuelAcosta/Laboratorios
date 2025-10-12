// Guardar DOM de las etiqutas
const btn_submit = document.getElementById("btn-submit");
const DOM_promedio = document.getElementById("promedio");
const DOM_situacion = document.getElementById("situacion");
const DOM_errorMsg = document.getElementById("error-msg");
const p_tags = document.getElementsByTagName("p");

// Ejecutar la función "enviarJSON()" al hacer click en el boton "btn-submit"
btn_submit.addEventListener("click", () => {
    let notas = guardarNotas();
    if (!notasValidas(notas)){
        return;
    }
    enviarJSON(notas);
});

// Envia un codigo JSON a un archivo php para que lo procese, y luego trae de vuelta el resultado
function enviarJSON(notas) {
    // Se envía un archivo JSON al archivo "scriptPromediar.php", a través del método POST
    fetch("scriptPromediar.php", {
        method: "POST",
        // Enviar el array "notas"
        headers: { "Content-Type": "application/json" }, body: JSON.stringify({ notas })
    })
        // JS espera a que el script php responda con otro archivo JSON, cuando recibe la respuesta, la
        // decodifica de json a un formato utilizable por el código
        .then(res => res.json())

        // Cuando recibe el json decodificado, lo convierte en un objeto, en este caso "data", el cual
        // tiene como atributos cada clave del json, junto con su valor correspondiente
        .then(data => {
            DOM_promedio.textContent = "Promedio: " + data.promedio;
            DOM_situacion.textContent = "Situación académica: " + data.situacion;
        })
}

function guardarNotas(){
    let notas = [];

    for (let i = 1; i <= 6; i++) {
        // Cada nota ingresada se guarda en el array "notas[]"
        // Traer el valor de cada input
        let nota = document.getElementById("nota" + i).value;

        // Si el input queda vacío, la nota es 0
        if (nota == "") {
            nota = 0;
        }

        // Guardar la nota
        notas[i - 1] = nota;
    }

    return notas;
}

function notasValidas(notas){
    for (let i = 0; i < notas.length; i++){
        if (notas[i] < 0){
            DOM_errorMsg.textContent = "La nota no puede ser menor a 0";
            return false;
        }

        if (notas[i] > 12){
            DOM_errorMsg.textContent = "La nota no puede ser mayor a 12";
            return false;
        }

        DOM_errorMsg.textContent = "";
    }

    return true;
}