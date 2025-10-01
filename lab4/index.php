<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Verificador de cédulas</title>
</head>

<body>
    <div id="form">
        <h3>Ingrese la cédula</h3>
        <input type="number" id="cedula"><br><br>
        <button onclick="validarInput()">Enviar</button>
        <p style="color: red;" id="errMsg"></p>
        <p style="color: green;" id="successMsg"></p>
    </div>

    <script src="scriptCalcCedula.js"></script>
</body>

</html>