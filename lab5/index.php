<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro de estudiantes</title>
</head>

<body>
    <main>
        <h2>Ingresar Información del Estudiante</h2>
        <form action="agregarNota.php" method="post" id="fichaEstudiante">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

            <div id="container-cedula">
                <input type="text" id="cedula" name="cedula" placeholder="Cédula" required>
                <p id="error-msg" class="hidden">blablabla</p>
            </div>

            <input type="text" id="localidad" name="localidad" placeholder="Localidad">

            <input type="text" id="direccion" name="direccion" placeholder="Dirección">

            <input type="tel" id="telefono" name="telefono" placeholder="teléfono">

            <input type="email" id="email" name="email" placeholder="E-Mail">

            <input type="submit" id="btn-submit">
        </form>
    </main>
    <a id="btn-volver" href="../lab6/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 -2 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
        Volver
    </a>

    <script src="fichaFilter.js"></script>
</body>

</html>