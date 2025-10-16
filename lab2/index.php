<?php
include_once "scripts.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laboratorio II - App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <nav class="mode-buttons">
            <!-- 
        Cuando el usuario hace click en el hyperlink, se envia el nombre de la pagina
        a traves del metodo GET -->
            <a href="?page=tablas" class="small-btn">Tablas</a>
            <a href="?page=probabilidad">Probabilidad 5 de ORO</a>
            <a href="?page=factorial" class="small-btn">Factorial</a>
        </nav>
        <!--se usan bloques de php para que el servidor entienda que eso tiene que ser ejecutado, si fuera un html normal no se ejecutaria-->
        <!-- se usa el metodo get para ver que pagina es la que se quiere ejecutar-->
        <!-- Si la pagina es "tablas" -->
        <?php if ($page === 'tablas') : include_once "bloqueTablas.php" ?>

            <!-- Si la pagina es "probabilidad" -->
        <?php elseif ($page === 'probabilidad') : include_once "bloqueProbabilidad.php"; ?>

            <!-- Si la pagina es "factorial" -->
        <?php elseif ($page === 'factorial'): include_once "bloqueFactorial.php"; ?>

            <!-- Si no se cumple ninguna de las condiciones anteriores -->
        <?php else: ?>
            <p>Página no encontrada.</p>
        <?php endif; ?>
    </main>

    <a id="btn-volver" href="../lab6/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 -2 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
        Volver
    </a>
</body>

</html>