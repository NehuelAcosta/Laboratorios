<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro de estudiantes</title>
</head>

<body>
    <h2>Ingresar información del estudiante</h2>
    <form action="agregarNota.php" method="post" id="fichaEstudiante">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="cedula">Cédula: </label>
        <input type="text" id="cedula" name="cedula" required>
        <p style="display: none;" id="errMsg"></p>

        <label for="localidad">Localidad: </label>
        <input type="text" id="localidad" name="localidad">

        <label for="direccion">Dirección: </label>
        <input type="text" id="direccion" name="direccion">

        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono">

        <label for="email">Email: </label>
        <input type="email" id="email" name="email">

        <input type="submit" id="btn-submit">
    </form>

    <script src="fichaFilter.js"></script>
</body>

</html>