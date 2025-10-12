<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Notas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="forms-container">
        <!-- Formulario Registrar Funcionarios -->
        <div class="form-card">
            <h2>Informacion del estudiante</h2>
            <div id="info-estudiante">
                <?php include_once "mostrardatos.php"; ?>
                <br>
                <p id="promedio">Promedio: --</p>
                <p id="situacion">Situación académica: --</p>

                <!-- Formulario para cerrar la sesión -->
                <form action="eliminarEstudiante.php">
                    <input type="submit" value="Borrar estudiante" id="delete-student">
                </form>
            </div>
        </div>

        <div class="form-card">
            <div>
                <h2>Agregar las calificaciones</h2>
                <input type="number" name="nota1" id="nota1" min="0" max="12" placeholder="Matemática">
                <input type="number" name="nota2" id="nota2" min="0" max="12" placeholder="Programación">
                <input type="number" name="nota3" id="nota3" min="0" max="12" placeholder="Ingeniería">
                <input type="number" name="nota4" id="nota4" min="0" max="12" placeholder="Física">
                <input type="number" name="nota5" id="nota5" min="0" max="12" placeholder="Sociología">
                <input type="number" name="nota6" id="nota6" min="0" max="12" placeholder="Cálculo">

                <p id="error-msg"></p>
                <button id="btn-submit">Enviar</button>

                <div id="calificaciones"></div>
            </div>
        </div>
        <div id="container-btn-volver">
            <a id="btn-volver" href="../lab6/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 -2 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
                Volver
            </a>
        </div>
    </div>
    <script src="scriptAgregarNota.js"></script>
</body>

</html>