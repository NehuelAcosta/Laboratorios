<?php
// La funcion "session_start()" permite almacenar informacion dentro
// de la variable global "$_SESSION", siendo esta un array asociativo
session_start();

$estudiante = [
    "Nombre" => $_POST["nombre"],
    "Apellido" => $_POST["apellido"],
    "Cedula" => $_POST["cedula"],
    "Localidad" => $_POST["localidad"],
    "Direccion" => $_POST["direccion"],
    "Telefono" => $_POST["telefono"],
    "Email" => $_POST["email"]
];

$_SESSION["estudiante"] = $estudiante;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Notas</title>
</head>

<body>
    <h2>Informacion del estudiante: </h2>
    <div id="infoEstudiante">
        <?php
        // Traer un dato de $_SESSION
        $estudiante = $_SESSION["estudiante"];

        // Para cada dato, se mostrará su nombre y valor
        foreach ($estudiante as $dato => $valor) {
            if ($valor === "") {
                // Si no se ingresó un dato, se indicará que es desconocido
                $valor = "desconocido";
            }

            echo "<p>$dato: $valor</p>";
        }
        ?>
        <p id="promedio">Promedio: --</p>
        <p id="situacion">Situación académica: --</p>

        <!-- Formulario para cerrar la sesión -->
        <form action="eliminarEstudiante.php">
            <input type="submit" value="Borrar estudiante">
        </form>
    </div>
    <div>
        <h2>Agregar las calificaciones</h2>
        <label for="nota1">Matemática:</label>
        <input type="number" name="nota1" id="nota1" min="0" max="12"><br><br>

        <label for="nota2">Programación:</label>
        <input type="number" name="nota2" id="nota2" min="0" max="12"><br><br>

        <label for="nota3">Ingeniería:</label>
        <input type="number" name="nota3" id="nota3" min="0" max="12"><br><br>

        <label for="nota4">Física:</label>
        <input type="number" name="nota4" id="nota4" min="0" max="12"><br><br>

        <label for="nota5">Sociología:</label>
        <input type="number" name="nota5" id="nota5" min="0" max="12"><br><br>

        <label for="nota6">Cálculo:</label>
        <input type="number" name="nota6" id="nota6" min="0" max="12"><br><br>

        <label for="nota7">Química:</label>
        <input type="number" name="nota7" id="nota7" min="0" max="12"><br><br>

        <label for="nota8">Ciberseguridad:</label>
        <input type="number" name="nota8" id="nota8" min="0" max="12"><br><br>

        <label for="nota9">Emprendedurismo:</label>
        <input type="number" name="nota9" id="nota9" min="0" max="12"><br><br>

        <label for="nota10">Ingenieria:</label>
        <input type="number" name="nota10" id="nota10" min="0" max="12"><br>

        <p style="color: red;" id="errorMsg"></p>
        <button id="btn-submit">Enviar</button>

        <div id="calificaciones"></div>
    </div>
    <script src="scriptAgregarNota.js"></script>
</body>

</html>