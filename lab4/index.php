<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Verificador de cédulas</title>
</head>

<body>
    <main>
        <div id="switch-buttons">
            <button onclick="showValidarBlock()">Validar cédula</button>
            <button onclick="showCrearBlock()">Crear dígito verificador</button>
        </div>

        <div id="block-validar">
            <h2>Ingrese la cédula</h2>
            <input type="number" id="cedula-verificar" placeholder="Ingrese la cédula aquí">
            <button class="enviar" onclick="validarCedula()">Enviar</button>
        </div>

        <div id="block-crear" class="hidden">
            <h2>Ingrese los primeros 7 dígitos de la cédula</h2>
            <div class="container"> 
                <input type="number" id="cedula-crear" placeholder="Ingrese los números aquí">
                <hr>
                <p id="result-digit"></p>
            </div>
            <button class="enviar" onclick="crearDigitoVerificador()">Enviar</button>
        </div>

        <p id="result-msg" class="hidden"></p>
    </main>

    <a id="btn-volver" href="../lab6/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 -2 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
        </svg>
        Volver
    </a>

    <script src="scriptCalcCedula.js"></script>
</body>

</html>