<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de estudiantes</title>
</head>

<body>
    <h2>Ingresar información del estudiante</h2>
    <form action="agregarNota.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="cedula">Cedula: </label>
        <input type="text" id="cedula" name="cedula" required><br><br>

        <label for="localidad">Localidad: </label>
        <input type="text" id="localidad" name="localidad"><br><br>

        <label for="direccion">Direccion: </label>
        <input type="text" id="direccion" name="direccion"><br><br>

        <label for="telefono">Telefono: </label>
        <input type="text" id="telefono" name="telefono"><br><br>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit">
    </form>
</body>

</html>