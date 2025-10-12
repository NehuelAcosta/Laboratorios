<h2>Tablas de multiplicar (1 a 10)</h2>
<!-- Envia un formulario a la misma pagina -->
<form method="post">
    <!--Para distinguir qué formulario se envió, cada uno incluye:-->
    <input type="hidden" name="page" value="tablas">

    <div class="container-userInput">
        <input type="number" name="numero" id="numero" max="999" placeholder="Número" required>
        <button type="submit">Mostrar tabla</button>
    </div>
</form>

<!-- Cuando termine de calcular la tabla, esta se mostrara en la pagina -->
<?php if (isset($table)) include_once "resultadoTablas.php"; ?>