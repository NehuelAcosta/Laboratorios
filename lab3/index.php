<?php
include_once "funciones.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Laboratorio III - Conversiones y Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="forms-container">
        <div class="form-card">
            <!--Conversiones -->
            <h2>Conversor de Bases</h2>
            <form method="post">
                <!--campo donde el usuario ingresa el número a convertir.-->
                <input type="text" name="numero" id="input-conversor" placeholder="Número" required>
                <!--menú desplegable para elegir la base del número ingresado (decimal, binario, octal o hexadecimal).-->
                <select name="base" id="select-conversor">
                    <option value="10">Decimal</option>
                    <option value="2">Binario</option>
                    <option value="8">Octal</option>
                    <option value="16">Hexadecimal</option>
                </select>
                <!-- menú desplegable para elegir la base del número ingresado (decimal, binario, octal o hexadecimal).-->
                <button type="submit" name="convertir" id="btn-calcular">Convertir</button>
            </form>

            <?php
            if (isset($_POST['convertir'])) showResultConvertir();
            ?>
        </div>

        <div class="form-card">
            <!--Calculadora -->
            <h2>Calculadora entre Bases</h2>
            <form method="post">
                <input type="text" name="num1" id="calcBases-input1" placeholder="Número 1" required>
                <select name="base1" id="calcBases-select1">
                    <option value="10">Decimal</option>
                    <option value="2">Binario</option>
                    <option value="8">Octal</option>
                    <option value="16">Hexadecimal</option>
                </select>
                <br><br>
                <input type="text" name="num2" id="calcBases-input2" placeholder="Número 1" required>
                <select name="base2" id="calcBases-select2">
                    <option value="10">Decimal</option>
                    <option value="2">Binario</option>
                    <option value="8">Octal</option>
                    <option value="16">Hexadecimal</option>
                </select>
                <br><br>
                <label>Operacion:
                    <select name="operacion">
                        <option value="suma">Suma</option>
                        <option value="resta">Resta</option>
                        <option value="multiplicacion">Multiplicacion</option>
                        <option value="division">Division</option>
                    </select>
                </label>
                <button type="submit" name="calcular">Calcular</button>
            </form>

            <?php
            if (isset($_POST['calcular'])) showResultCalcular();
            ?>
        </div>
    </div>

    <br><br>
    <a id="btn-volver" href="../lab6/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 -2 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
        Volver
    </a>

    <script src="script.js"></script>
</body>

</html>