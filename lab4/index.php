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
            <input type="number" id="cedula-verificar">
            <button class="enviar" onclick="validarCedula()">Enviar</button>
        </div>

        <div id="block-crear" class="hidden">
            <h2>Ingrese los primeros 7 dígitos de la cédula</h2>
            <div class="container"> 
                <input type="number" id="cedula-crear">
                <hr>
                <p id="result-digit"></p>
            </div>
            <button class="enviar" onclick="crearDigitoVerificador()">Enviar</button>
        </div>

        <p id="result-msg" class="hidden"></p>
    </main>

    <a id="btn-volver" href="../lab6/index.php">Volver</a>

    <script src="scriptCalcCedula.js"></script>
</body>

</html>