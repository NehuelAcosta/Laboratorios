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
        // La funcion "session_start()" permite almacenar informacion dentro
        // de la variable global "$_SESSION", siendo esta un array asociativo
        session_start(); 
        // Ejecutar código de otros archivos php
        include 'scriptEstudiante.php';
        include 'fichaEstudiante.php';
        ?>
        <p id="promedio">Promedio: --</p>
        <p id="situacion">Situación académica: --</p>

        <!-- Formulario para cerrar la sesión -->
        <form action="eliminarEstudiante.php">
            <input type="submit" value="Borrar estudiante">
        </form>
    </div>
    <div>
        <h2>Agregar una calificación</h2>
        <label for="nota">Nota a agregar:</label>
        <input type="number" name="nota" id="nota"><br><br>

        <button onclick="agregarNota()">Agregar</button>
        <p style="color: red;" id="errorMsg"></p>

        <div id="calificaciones"></div>

        <script src="scriptAgregarNota.js"></script>
    </div>
</body>

</html>