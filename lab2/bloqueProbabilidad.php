<h2>Probabilidad - 5 de ORO</h2>
<p>Ingresa la cantidad de veces que jugaste al 5 de Oro:</p>
<!-- Envia un formulario a la misma pagina -->
<form method="post">
    <!--valida si se envia el formulario-->
    <input type="hidden" name="page" value="probabilidad">

    <div class="container-userInput">
        <input type="number" name="plays" id="plays" min="1" placeholder="Cantidad de jugadas" required>
        <button type="submit">Calcular</button>
    </div>
</form>

<?php if (isset($prob_percent)) include_once "resultadoProbabilidad.php"; ?>